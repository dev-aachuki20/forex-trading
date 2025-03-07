<?php

namespace App\Livewire\Admin\FeaturedManage;

use App\Models\FeaturedManager;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Language;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;
    public $feature_id = null, $title, $description, $pdf, $image, $originalImage, $originalPdf;
    // public $publish_date;
    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction'
    ];
    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        if (Str::contains('active', strtolower($searchValue))) {
            $statusSearch = 1;
        } else if (Str::contains('inactive', strtolower($searchValue))) {
            $statusSearch = 0;
        }
        $languagedata =  Language::where('status', 1)->get();

        $featuredRecords = [];
        if ($this->activeTab) {
            $featuredRecords = FeaturedManager::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    // ->orWhere('publish_date', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.featured-manage.index', compact('featuredRecords', 'languagedata'));
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
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
            'image', 'originalImage', 'originalPdf', 'title', 'description', 'pdf', 'search', 'status'
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

        $validatedData = $this->validate([
            'title'           => ['required', 'max:100', 'unique:featured_managers,title,Null,deleted_at'],
            'description'     => 'required|strip_tags:' . config('constants.feature_description_length'),
            // 'publish_date'    => ['required', 'date', 'after:now'],
            'status'          => ['required'],
            'image'           => ['required','file','valid_extensions:svg','max:'.config('constants.img_max_size')],
            'pdf'             => ['required', 'mimes:pdf'],
        ],[
            'image.valid_extensions' => 'The image must be an SVG file.',
            'description.strip_tags' => 'The description field must not be greater than '.config('constants.feature_description_length').' character'
        ]);

        $validatedData['language_id'] = $this->languageId;

        $features = FeaturedManager::create($validatedData);

        #for image
        uploadImage($features, $this->image, 'featured/image/', "featured-image", 'original', 'save', null);

        #for pdfs
        uploadImage($features, $this->pdf, 'featured/pdf/', "featured-pdf", 'original', 'save', null);

        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $feature = FeaturedManager::findOrFail($id);

        $this->title           = $feature->title;
        $this->feature_id      = $id;
        // $this->publish_date    = convertDateTimeFormat($feature->publish_date, 'date');;
        $this->description     = $feature->description;
        $this->status          = $feature->status;
        $this->originalImage   = $feature->image_url;
        $this->originalPdf     = $feature->pdf_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        
        $validatedArray = [
            'title'           => ['required', 'max:100', Rule::unique('featured_managers')->whereNull('deleted_at')->ignore($this->feature_id, 'id')],
            // 'publish_date'    => ['required', 'after:now'],
            'description'     => 'required|strip_tags:' . config('constants.feature_description_length'),
            'status'          => ['required'],
        ];

        if ($this->image) {
            $validatedArray['image'] = 'required|file|valid_extensions:svg|max:' . config('constants.img_max_size');
        }
        if ($this->pdf) {
            $validatedArray['pdf'] = 'required';
        }

        $customMessages = [
            'image.valid_extensions' => 'The image must be an SVG file.',
            'description.strip_tags'=> 'The description field must not be greater than '.config('constants.feature_description_length').' character'
        ];
        
        $validatedData = $this->validate($validatedArray,$customMessages);
        $validatedData['status'] = $this->status;

        $feature = FeaturedManager::find($this->feature_id);

        # Check if the image has been changed
        $uploadId = null;
        if ($this->image) {
            if ($feature->featuredImage) {
                $uploadId = $feature->featuredImage->id;
                uploadImage($feature, $this->image, 'featured/image/', "featured-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($feature, $this->image, 'featured/image/', "featured-image", 'original', 'save', null);
            }
        }

        # Check if the pdf has been changed
        $uploadId = null;
        if ($this->pdf) {
            if ($feature->pdfImage) {
                $uploadId = $feature->pdfImage->id;
                uploadImage($feature, $this->pdf, 'featured/pdf/', "featured-pdf", 'original', 'update', $uploadId);
            } else {
                uploadImage($feature, $this->pdf, 'featured/pdf/', "featured-pdf", 'original', 'save', null);
            }
        }

        $feature->update($validatedData);

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
        $model = FeaturedManager::find($deleteId);

        if ($model->featuredImage) {
            $uploadImageId = $model->featuredImage->id;
            deleteFile($uploadImageId);
        }

        if ($model->featuredPdf) {
            $uploadImageId = $model->featuredPdf->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->feature_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
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
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['feature_id' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $feature_id = $data['inputAttributes']['feature_id'];
        $model = FeaturedManager::find($feature_id);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex, 'activeTab' => $this->activeTab]);
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
