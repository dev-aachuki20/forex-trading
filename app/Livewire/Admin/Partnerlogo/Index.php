<?php

namespace App\Livewire\Admin\Partnerlogo;

use Livewire\Component;
use App\Models\Language;
use App\Models\PartnerLogo;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public  $activeTab = 'all';
    public  $partnerLogoId, $brand_name, $image, $originalImage, $status = 1;
    public  $languageId = null;
    public  $recordImage;
    public  $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];
    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();
        $getlangId =  Language::where('id', $this->activeTab)->where('status', 1)->value('id');
        $partnerLogo = [];

        $partnerLogo = PartnerLogo::query()->where(function ($query) use ($searchValue) {
            $query->where('brand_name', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        });

        if ($getlangId) {
            $partnerLogo =   $partnerLogo->where('language_id', $getlangId);
        } else {
            $partnerLogo;
        }

        $partnerLogo = $partnerLogo->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationLength);
        return view('livewire.admin.partner-logo.index', compact('partnerLogo', 'languagedata'));
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
    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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

    public function store()
    {
        $validateData = $this->validate([
            'brand_name'      => 'required',
            'status'          => 'required',
            'image'           => 'required',
        ]);

        $validateData['created_by'] = Auth::user()->id;
        $validateData['language_id'] = $this->languageId;

        $brandData = PartnerLogo::where('deleted_at', null)->where('brand_name', $this->brand_name)->first();
        if (!$brandData) {
            $partnerLogo = PartnerLogo::create($validateData);

            // upload the image
            if ($this->image != null) {
                uploadImage($partnerLogo, $this->image, 'partner-logo/images/', "partner-logo-image", 'original', 'save', null);
            }

            $this->formMode = false;
            $this->resetInputFields();
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Brand name already exist');
        }
        // return redirect()->to(url()->previous());
    }

    public function edit($id)
    {
        $record = PartnerLogo::where('id', $id)->where('deleted_at', null)->first();
        $this->partnerLogoId  = $id;
        $this->brand_name     = $record->brand_name;
        $this->status         = $record->status;
        $this->originalImage  = $record->image_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'brand_name'      => 'required',
            'status'     => 'required',
        ]);

        $parnerlogoData = PartnerLogo::find($this->partnerLogoId);

        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $parnerlogoData->partnerLogoImage->id;
            uploadImage($parnerlogoData, $this->image, 'partner-logo/images/', "partner-logo-image", 'original', 'update', $uploadId);
        }

        PartnerLogo::where('id', $this->partnerLogoId)->update($validatedData);
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
        $model = PartnerLogo::find($delid);
        $uploadImageId = $model->partnerLogoImage->id;
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
            'inputAttributes' => ['partnerLogoId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $partnerLogoId = $data['inputAttributes']['partnerLogoId'];
        $model = PartnerLogo::find($partnerLogoId);
        $status = $model->status == 1 ? 0 : 1;
        PartnerLogo::where('id', $partnerLogoId)->update(['status' => $status]);
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->flash('success',  getLocalization('change_status'));
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->brand_name = '';
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
        $this->partnerLogoId    = $id;
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
