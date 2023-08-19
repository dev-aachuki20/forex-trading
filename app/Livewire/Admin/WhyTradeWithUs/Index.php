<?php

namespace App\Livewire\Admin\WhyTradeWithUs;

use App\Models\Glance;
use Livewire\Component;
use App\Models\Language;
use App\Models\WhyTradeWithUs;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public  $activeTab = 1;
    public  $tradeId, $title, $description, $image, $originalImage, $status = 1;
    public  $languageId = null;
    public  $recordImage;
    public  $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];
    public function render()
    {
        $searchValue = $this->search;

        $languagedata =  Language::where('status', 1)->get();
        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $trades = [];
        if ($getlangId) {
            $trades = WhyTradeWithUs::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.why-trade-with-us.index', compact('trades', 'languagedata'));
    }
    public function sortBy($columnName)
    {
        $this->resetPage();
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function create()
    {
        $this->resetInputFields();
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $validateData =  $this->validate([
            'title'           => 'required',
            'description'     => 'required',
            'status'          => 'required',
            'image'           => 'required',
        ]);

        $validateData['language_id'] = $this->languageId;

        $trade = WhyTradeWithUs::where('deleted_at', null)->where('title', $this->title)->first();
        if (!$trade) {
            $traderecords = WhyTradeWithUs::create($validateData);
            // upload the image
            if ($this->image) {
                uploadImage($traderecords, $this->image, 'trade/images/', "trade-image", 'original', 'save', null);
            }

            $this->formMode = false;
            $this->resetInputFields();
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Title already exist');
        }
    }

    public function edit($id)
    {
        $record = WhyTradeWithUs::where('id', $id)->where('deleted_at', null)->first();
        $this->tradeId       = $id;
        $this->title         = $record->title;
        $this->description   = $record->description;
        $this->status        = $record->status;
        $this->originalImage = $record->image_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title'        => 'required',
            'description'  => 'required',
            'status'       => 'required',
        ]);

        $records = WhyTradeWithUs::find($this->tradeId);

        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $records->tradeImage->id;
            uploadImage($records, $this->image, 'trade/images/', "trade-image", 'original', 'update', $uploadId);
        }

        WhyTradeWithUs::where('id', $this->tradeId)->update($validatedData);
        $this->resetInputFields();
        $this->formMode = false;
        $this->updateMode = false;

        $this->alert('success',  getLocalization('updated_success'));
    }

    public function delete($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to delete it.',
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'deleteConfirm',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['delid' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $delid = $data['inputAttributes']['delid'];
        $model = WhyTradeWithUs::find($delid);
        $uploadImageId = $model->tradeImage->id;
        deleteFile($uploadImageId);
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function toggle($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['glanceId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $tradeId = $data['inputAttributes']['glanceId'];
        $model = WhyTradeWithUs::find($tradeId);
        $status = $model->status == 1 ? 0 : 1;
        WhyTradeWithUs::where('id', $tradeId)->update(['status' => $status]);
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->alert('success',  getLocalization('change_status'));
        return redirect()->to(url()->previous());
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->status = 1;
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }


    public function clearSearch()
    {
        $this->search = '';
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->tradeId  = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        session()->put('active_tab', $tab);
        $this->search = '';
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
