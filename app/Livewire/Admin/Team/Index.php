<?php

namespace App\Livewire\Admin\Team;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Language;
use App\Models\Team;
use App\Models\Uploads;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public $uploadedFiles = [];
    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $activeTab = 1;
    public $teammember = false;
    public $bkmember = false;
    public $statusText = 'Active', $backgroundColor = '#0ab39c', $switchPosition = 'right';
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    public $team_id, $name, $designation, $type, $brand_images = [],  $description, $image, $originalImage, $originalBrandImage = [], $status = 1;
    public $facebook_link;
    public $twitter_link;
    public $instagram_link;
    public $youtube_link;
    public $googleplus_link;
    public $languageId,$deleteBrandImageIds=[];

    public $tmpBrandImageArr =[];

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'uploadedFiles', 'memberupdatedType', 'removeBrandImage'
    ];
    
    
    public function updatedBrandImages(){
        foreach ($this->brand_images as $key=>$image) {
            // You can perform validation on the uploaded image if needed
            // For example, check file type, size, etc.
            
            // Add the image to the array
            $this->tmpBrandImageArr[] = $image;
        }

        $this->brand_images = $this->tmpBrandImageArr;

    }

    public function removeBrandImage($index,$action = 'new',$update_id = null){
        // Remove an image from the brand images array
        if($action == 'new'){
            unset($this->brand_images[$index]);
            $this->brand_images = array_values($this->brand_images);
        }else if($action == 'update' && $update_id){
            unset($this->originalBrandImage[$index]);
            $this->deleteBrandImageIds[] = $update_id;
        }
    }

    public function memberupdatedType()
    {
        $member = $this->type;
        if (isset($member)) {
            if ($member == 1) {
                $this->teammember = true;
                $this->bkmember = false;
            } elseif ($member == 2) {
                $this->bkmember = true;
                $this->teammember = false;
            } else {
                $this->teammember = false;
                $this->bkmember = false;
            }
            $this->initializePlugins();
        }
    }

    public function uploadedFiles($files)
    {
        foreach ($files as $file) {
            $this->brand_image[] = $file->getRealPath();
        }
    }

    public function render()
    {
        $searchValue = $this->search;

        $languagedata =  Language::where('status', 1)->get();

        $collection = collect(config('constants.member_types'));

        $memberType = null;
        if($searchValue){
            $memberType = $collection->search(function ($item) use ($searchValue) {
                return stripos($item, strtolower($searchValue)) !== false;
            });
        }

        $allTeams = [];
        if ($this->activeTab) {
            $allTeams = Team::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue,$memberType) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('designation', 'like', '%' . $searchValue . '%');
                    
                    if($memberType){
                        $query->orWhere('type', $memberType);
                    }
                    
                    $query->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
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
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
        $this->reset([
            'image', 'originalImage', 'brand_images', 'originalBrandImage', 'name', 'designation', 'description', 'type', 'facebook_link', 'twitter_link', 'instagram_link', 'youtube_link', 'googleplus_link', 'search', 'status','deleteBrandImageIds'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
        $this->reset(['bkmember','teammember','deleteBrandImageIds']);
    }

    public function store()
    {
        // dd($this->all());
        if ($this->type == 1) {
            $validatedData = $this->validate([
                'name'             => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'designation'      => 'required',
                'status'           => 'required',
                'image'            => 'required|image|max:' . config('constants.img_max_size'),
                'type'             => 'required',
                'facebook_link'    => 'required',
                'twitter_link'     => 'nullable',
                'instagram_link'   => 'nullable',
                'youtube_link'     => 'nullable',
                'googleplus_link'  => 'nullable',
            ], [
                'name.regex' => 'Only letters allowed',
            ]);
        } elseif ($this->type == 3) {
            $validatedData = $this->validate([
                'name'          => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'designation'   => 'required',
                'status'        => 'required',
                'image'         => 'required|image|max:' . config('constants.img_max_size'),
                'type'          => 'required',
            ]);
        } else {
            $validatedData = $this->validate([
                'name'          => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'designation'   => 'required',
                'status'        => 'required',
                'image'         => 'required|image|valid_extensions:png|max:' . config('constants.img_max_size'),
                'type'          => 'required',
                'description'   => 'required|strip_tags:'.config('constants.team_description_length'),
                'brand_images.*' => 'nullable',
            ], [
                'name.regex' => 'Only letters allowed',
                'description.strip_tags'=> 'The description field must not be greater than '.config('constants.team_description_length').' character',
                'image.valid_extensions' => 'The image must be an PNG file.',
            ]);
        }
        $validatedData['language_id'] = $this->languageId;
        $team = Team::create($validatedData);
        # Upload the profile image
        if ($this->image) {
            uploadImage($team, $this->image, 'team/image/', "team", 'original', 'save', null);
        }

        // Upload multiple brand logo images
        if ($this->type == 2 && $this->brand_images) {
            foreach ($this->brand_images as $key => $brandImage) {
                uploadImage($team, $brandImage, 'team/brand_images/', "brand-logo", 'original', 'save', null);
            }
        }

        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }


    public function edit($id)
    {
        // $this->resetPage('page');
        $this->reset(['originalBrandImage']);
        
        // Reset the error bag.
        $this->resetErrorBag();
        
        $team = Team::findOrFail($id);
        $this->team_id             = $id;
        $this->name                = $team->name;
        $this->designation         = $team->designation;
        $this->description         = $team->description;
        $this->facebook_link       = $team->facebook_link;
        $this->twitter_link        = $team->twitter_link;
        $this->instagram_link      = $team->instagram_link;
        $this->youtube_link        = $team->youtube_link;
        $this->googleplus_link     = $team->googleplus_link;
        $this->type                = $team->type;
        $this->status              = $team->status;
        $this->originalImage       = $team->image_url;
        $this->originalBrandImage  = $team->brand_image_url;
        $this->formMode = true;
        $this->updateMode = true;

        if ($this->type == 1) {
            $this->teammember = true;
            $this->bkmember = false;
        }
        if ($this->type == 2) {
            $this->bkmember = true;
            $this->teammember = false;
        }
        $this->initializePlugins();
    }

    public function update()
    {
        $validateColumns = [
            'name'             => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'designation'      => 'required',
            'status'           => 'required',
            'type'             => 'required',
        ];

        $customMessages = [
            'name.regex' => 'Only letters allowed',
        ];

        if ($this->type == 1) {
            $validateColumns['facebook_link']   = 'required';
            $validateColumns['twitter_link']    = 'nullable';
            $validateColumns['instagram_link']  = 'nullable';
            $validateColumns['youtube_link']    = 'nullable';
            $validateColumns['googleplus_link'] = 'nullable';
        } elseif ($this->type == 2){

            $validateColumns['brand_images.*'] = 'nullable|image';
            $validateColumns['description']   = 'required|strip_tags:'.config('constants.team_description_length');

            $customMessages['description.strip_tags'] = 'The description field must not be greater than '.config('constants.team_description_length').' character';

        }

        if ($this->image) {
            if($this->type == 2){
    
                $validateColumns['image'] = 'required|image|valid_extensions:png|max:' . config('constants.img_max_size');

                $customMessages['image.valid_extensions'] = 'The image must be an PNG file.';

            }else{
                $validateColumns['image'] = 'required|image|max:' . config('constants.img_max_size');

            }
        }

       
        $validatedData = $this->validate($validateColumns,$customMessages);

        $team = Team::find($this->team_id);
        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            if($team->teamImage){
                $uploadId = $team->teamImage->id;
                uploadImage($team, $this->image, 'team/image/', "team", 'original', 'update', $uploadId);
            }else{
                uploadImage($team, $this->image, 'team/image/', "team", 'original', 'save', null);
            }
        }


        if ($this->type == 1) {
            $validatedData['description'] = null;
        }
        if ($this->type == 2) {
            $validatedData['facebook_link'] = null;
            $validatedData['twitter_link'] = null;
            $validatedData['instagram_link'] = null;
            $validatedData['youtube_link'] = null;
            $validatedData['googleplus_link'] = null;
        }

        // Upload multiple brand logo images
        if ($this->brand_images) {
            if ($this->type == 2 && $this->brand_images) {
                foreach ($this->brand_images as $key => $brandImage) {
                    uploadImage($team, $brandImage, 'team/brand_images/', "brand-logo", 'original', 'save', null);
                }
            }
        }

        if(count($this->deleteBrandImageIds) > 0){
            foreach($this->deleteBrandImageIds as $uploadId){
                deleteFile($uploadId);
            }
        }

        $team->update($validatedData);

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

    public function toggle($id, $toggleIndex)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'confirmButtonText' => 'Yes Confirm!',
            'cancelButtonText' => 'No Cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['teamId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }


    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $teamId = $data['inputAttributes']['teamId'];
        $model = Team::find($teamId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }


    public function show($id)
    {
        $this->resetPage('page');
        $team = Team::find($id);
        $this->team_id  = $id;
        $this->type = $team->type;
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

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }

}
