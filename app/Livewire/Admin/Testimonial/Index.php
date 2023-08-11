<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use Illuminate\Support\Str;
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

    public  $testimonial_id, $name, $designation, $company_name, $description, $rating,$image, $originalImage, $status = 1;

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
        return view('livewire.admin.testimonial.index', compact('allTestimonials'));
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
            'company_name'      => 'required',
            'description'       => 'required',
            'rating'            => 'required|digits_between:1,5',
            'status'            => 'required',
            'image'             => 'required|image|max:' . config('constants.img_max_size'),
        ]);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;

        $testimonial = Testimonial::create($validatedData);

        # Upload the image
        uploadImage($testimonial, $this->image, 'testimonial/image/', "testimonial", 'original', 'save', null);

        $this->formMode = false;
        $this->resetInputFields();
        $this->flash('success',  getLocalization('added_success'));
        return redirect()->route('admin.testimonial');
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
    }

    public function update()
    {
        $validatedArray['name']         = 'required';
        $validatedArray['company_name'] = 'required';
        $validatedArray['designation']  = 'required';
        $validatedArray['description']  = 'required';
        $validatedArray['rating']       = 'required|digits_between:1,5';
        $validatedArray['status']       = 'required';

        if ($this->image) {
            $validatedArray['image'] = 'required|image|max:' . config('constants.img_max_size');
        }

        $validatedData = $this->validate($validatedArray);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->language_id;

        $testimonial = Testimonial::find($this->testimonial_id);

        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $testimonial->testimonialImage->id;
            uploadImage($testimonial, $this->image, 'testimonial/image/', "testimonial", 'original', 'update', $uploadId);
        }

        $testimonial->update($validatedData);

        $this->formMode = false;
        $this->updateMode = false;
        $this->flash('success',  getLocalization('updated_success'));
        $this->resetInputFields();
        return redirect()->to(url()->previous());
    }

    public function delete($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to delete it.',
            'toast' => false,
            'position' => 'center',
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
        $uploadId = $model->uploads()->first()->id;
        deleteFile($uploadId);
        $model->delete();
        $this->flash('success',  getLocalization('delete_success'));
        return redirect()->to(url()->previous());
    }

    public function toggle($id)
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
            'inputAttributes' => ['testimonialId' => $id],
        ]);
    }


    public function confirmedToggleAction($data)
    {
        $testimonialId = $data['inputAttributes']['testimonialId'];
        $model = Testimonial::find($testimonialId);
        $status = $model->status == 1 ? 0 : 1;
        Testimonial::where('id', $testimonialId)->update(['status' => $status]);
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->flash('success',  getLocalization('change_status'));
        return redirect()->to(url()->previous());
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
}
