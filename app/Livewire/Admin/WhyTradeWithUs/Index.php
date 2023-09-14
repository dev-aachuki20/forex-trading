<?php

namespace App\Livewire\Admin\WhyTradeWithUs;

use Livewire\Component;
use App\Models\Language;
use App\Models\WhyTradeWithUs;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public  $activeTab = 1;
    public  $tradeId, $title, $description, $image, $originalImage, $status = 1;
    public  $languageId = null;
    public  $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];
    public function render()
    {
        $searchValue = $this->search;

        $languagedata =  Language::where('status', 1)->get();

        $trades = [];
        if ($this->activeTab) {
            $trades = WhyTradeWithUs::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue) {
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
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
        $this->reset([
            'image', 'originalImage', 'title', 'description', 'search', 'status'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    public function store()
    {
        $validateData =  $this->validate([
            'title'           => 'required|max:' . config('constants.titlelength'),
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
            'title'        => 'required|max:' . config('constants.titlelength'),
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

    public function toggle($id, $toggleIndex)
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
            'inputAttributes' => ['glanceId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $tradeId = $data['inputAttributes']['glanceId'];
        $model = WhyTradeWithUs::find($tradeId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
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
        $this->search = '';
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
