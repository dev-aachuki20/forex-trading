<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use App\Models\Testimonial;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Language;


class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    public  $testimonial_id, $name, $designation, $company_name, $description, $rating, $image, $originalImage, $status = 1;

    public  $languageId;
    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm'
    ];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        // if(Str::contains('approve', strtolower($searchValue))){
        //     $statusSearch = 1;
        // }else if(Str::contains('decline', strtolower($searchValue))){
        //     $statusSearch = 0;
        // }
        $languagedata =  Language::where('status', 1)->get();
        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $allTestimonials = [];
        if ($this->activeTab == $getlangId) {
            $allTestimonials = Testimonial::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('rating', $searchValue)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.testimonial.index', compact('allTestimonials', 'languagedata'));
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
        $this->initializePlugins();
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetInputFields();
        $this->resetErrorBag();
    }


    public function store()
    {
        $validatedData = $this->validate([
            'name'              => 'required',
            'designation'       => 'required',
            'company_name'      => 'required',
            'description'       => 'required|strip_tags|max:' . config('constants.textlength'),
            'rating'            => 'required|digits_between:1,5',
            'status'            => 'required',
            'image'             => 'nullable|image|max:' . config('constants.img_max_size'),
        ],[
            'description.strip_tags' => 'The description fields is required.',
        ]);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;

        $testimonial = Testimonial::create($validatedData);

        # Upload the image
        if($this->image){
            uploadImage($testimonial, $this->image, 'testimonial/image/', "testimonial", 'original', 'save', null);
        }

        $this->formMode = false;
        $this->resetInputFields();
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonial_id = $id;
        $this->name           = $testimonial->name;
        $this->company_name   = $testimonial->company_name;
        $this->rating         = $testimonial->rating;
        $this->designation    = $testimonial->designation;
        $this->description    = $testimonial->description;
        $this->status         = $testimonial->status;
        $this->originalImage  = $testimonial->image_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray['name']         = 'required';
        $validatedArray['company_name'] = 'required';
        $validatedArray['designation']  = 'required';
        $validatedArray['description']  = 'required|strip_tags|max:' . config('constants.textlength');
        $validatedArray['rating']       = 'required|digits_between:1,5';
        $validatedArray['status']       = 'required';

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }

        $validatedData = $this->validate($validatedArray,
        [
            'description.strip_tags' => 'The description fields is required.',
        ]);

        $validatedData['status']      = $this->status;

        $testimonial = Testimonial::find($this->testimonial_id);

        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            if($testimonial->testimonialImage){
                $uploadId = $testimonial->testimonialImage->id;
                uploadImage($testimonial, $this->image, 'testimonial/image/', "testimonial", 'original', 'update', $uploadId);
            }else{
                uploadImage($testimonial, $this->image, 'testimonial/image/', "testimonial", 'original', 'save', null);
            }
        }

        $testimonial->update($validatedData);

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
        $model = Testimonial::find($deleteId);
        if($model->uploads){
            $uploadId = $model->uploads()->first()->id;
            deleteFile($uploadId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function toggle($id, $toggleIndex)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes Confirm!',
            'cancelButtonText' => 'No Cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['testimonialId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }


    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $testimonialId = $data['inputAttributes']['testimonialId'];
        $model = Testimonial::find($testimonialId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->company_name = '';
        $this->designation = '';
        $this->description = '';
        $this->rating = '';
        $this->status = 1;
        $this->image = null;
        $this->originalImage = null;
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->testimonial_id = $id;
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
