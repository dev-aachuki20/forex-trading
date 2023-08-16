<?php

namespace App\Livewire\Admin\Team;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Testimonial;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Language;
use App\Models\Team;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $activeTab = 1;
    public $statusText = 'Active', $backgroundColor = '#0ab39c', $switchPosition = 'right';
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    public $team_id, $name, $designation, $brand_image, $description, $rating, $image, $originalImage, $originalBrandImage, $status = 1;

    public  $languageId;
    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm'
    ];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;

        $languagedata =  Language::where('status', 1)->get();
        $getlangId    =  Language::where('id', $this->activeTab)->value('id');

        $allTeams = [];
        if ($getlangId) {
            $allTeams = Team::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('designation', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.team.index', compact('allTeams', 'languagedata'));
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
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
        $this->resetInputFields();
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
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
        $validatedData = $this->validate([
            'name'              => 'required',
            'designation'       => 'required',
            'description'       => 'required',
            'status'            => 'required',
            'image'             => 'required|image|max:' . config('constants.img_max_size'),
            'brand_image'       => 'required|max:' . config('constants.img_max_size'),
        ]);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        $team = Team::create($validatedData);
        # Upload the image
        uploadImage($team, $this->image, 'team/image/', "team", 'original', 'save', null);

        # upload multiple brand logo images 
        uploadMultipleImages($team, $this->brand_image, 'brand-logo/image/', "brand-logo", 'original', 'save', null);

        $this->formMode = false;
        $this->resetInputFields();
        $this->alert('success',  getLocalization('added_success'));
    }


    public function edit($id)
    {
        $this->resetPage('page');
        $testimonial = Team::findOrFail($id);
        $this->team_id        = $id;
        $this->name           = $testimonial->name;
        $this->designation    = $testimonial->designation;
        $this->description    = $testimonial->description;
        $this->status         = $testimonial->status;
        $this->originalImage  = $testimonial->image_url;
        $this->originalBrandImage  = $testimonial->brand_image_url;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedArray['name']         = 'required';
        $validatedArray['designation']  = 'required';
        $validatedArray['description']  = 'required';
        $validatedArray['status']       = 'required';

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }

        // if ($this->brand_image) {
        //     $validatedArray['brand_image'] = 'required';
        // }

        $validatedData = $this->validate($validatedArray);

        $validatedData['status']      = $this->status;

        $team = Team::find($this->team_id);


        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $team->teamImage->id;
            uploadImage($team, $this->image, 'team/image/', "team", 'original', 'update', $uploadId);
        }

        # Brand logo image
        // $uploadbrandLogoId = null;
        // if ($this->brand_image) {
        //     $uploadId = $team->brandLogoImage->id;
        //     uploadMultipleImages($team, $this->brand_image, 'brand-logo/image/', "brand-logo", 'original', 'update', $uploadbrandLogoId);
        // }

        // dd($uploadbrandLogoId); 


        $team->update($validatedData);

        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
        $this->resetInputFields();
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
            'inputAttributes' => ['deleteId' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $deleteId = $data['inputAttributes']['deleteId'];
        $model = Team::find($deleteId);
        $uploadImageId = $model->teamImage->id;
        deleteFile($uploadImageId);
        $uploadBrandImageId = $model->brandLogoImage;
        deleteMultipleFiles($uploadBrandImageId);
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function toggle($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'confirmButtonText' => 'Yes Confirm!',
            'cancelButtonText' => 'No Cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['teamId' => $id],
        ]);
    }


    public function confirmedToggleAction($data)
    {
        $teamId = $data['inputAttributes']['teamId'];
        $model = Team::find($teamId);
        $status = $model->status == 1 ? 0 : 1;
        Team::where('id', $teamId)->update(['status' => $status]);
        $this->statusText      = $status == 1 ? 'Active' : 'Deactive';
        // $this->backgroundColor = $status == 1 ? '#0ab39c' : '#f06548';
        // $this->switchPosition  = $status == 1 ? 'right' : 'left';
        $this->alert('success',  getLocalization('change_status'));
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->designation = '';
        $this->description = '';
        $this->status = 1;
        $this->image = null;
        $this->brand_image = null;
        $this->originalImage = null;
        $this->originalBrandImage = null;
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->team_id  = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }


    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
