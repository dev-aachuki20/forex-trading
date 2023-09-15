<?php

namespace App\Livewire\Admin\TraderResources;

use App\Models\Language as ModelsLanguage;
use App\Models\TraderResource;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;

    public $resource_id = null, $title, $description, $pdf, $image, $originalImage, $originalPdf;
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
        $languagedata =  ModelsLanguage::where('status', 1)->get();

        $resources = [];
        if ($this->activeTab) {
            $resources = TraderResource::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.trader-resources.index', compact('languagedata', 'resources'));
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
        $this->languageId = ModelsLanguage::where('id', $this->activeTab)->value('id');
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
            'title'           => ['required', 'max:100', 'unique:trader_resources,title'],
            'description'     => ['required', 'strip_tags'],
            'status'          => ['required'],
            'image'           => ['required', 'valid_extensions:png'],
            'pdf'             => ['required', 'mimes:pdf'],
        ], [
            'image.valid_extensions' => 'The image must be an PNG file.',
            'description.strip_tags' => 'The description field is required.',
        ]);

        $validatedData['language_id'] = $this->languageId;

        $features = TraderResource::create($validatedData);

        #for image
        uploadImage($features, $this->image, 'trader-resources/image/', "trader-resources-image", 'original', 'save', null);

        #for pdfs
        uploadImage($features, $this->pdf, 'trader-resources/pdf/', "trader-resources-pdf", 'original', 'save', null);

        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $resources = TraderResource::findOrFail($id);

        $this->title           = $resources->title;
        $this->resource_id      = $id;
        $this->description     = $resources->description;
        $this->status          = $resources->status;
        $this->originalImage   = $resources->image_url;
        $this->originalPdf     = $resources->pdf_url;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedArray = [
            'title'           => ['required', 'max:100', 'unique:trader_resources,title,' . $this->resource_id],
            'description'     => ['required', 'strip_tags'],
            'status'          => ['required'],
        ];

        if ($this->image) {
            $validatedArray['image'] = 'required|image|valid_extensions:png|max:' . config('constants.img_max_size');
        }
        if ($this->pdf) {
            $validatedArray['pdf'] = 'required';
        }

        $validatedData = $this->validate($validatedArray, [
            'image.valid_extensions' => 'The image must be an PNG file.',
            'description.strip_tags' => 'The description field is required.',
        ]);

        $validatedData['status'] = $this->status;

        $resources = TraderResource::find($this->resource_id);

        # Check if the image has been changed
        $uploadId = null;
        if ($this->image) {
            if ($resources->resourceImage) {
                $uploadId = $resources->resourceImage->id;
                uploadImage($resources, $this->image, 'trader-resources/image/', "trader-resources-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($resources, $this->image, 'trader-resources/image/', "trader-resources-image", 'original', 'save', null);
            }
        }

        # Check if the pdf has been changed
        $uploadId = null;
        if ($this->pdf) {
            if ($resources->resourcePdf) {
                $uploadId = $resources->resourcePdf->id;
                uploadImage($resources, $this->pdf, 'trader-resources/pdf/', "trader-resources-pdf", 'original', 'update', $uploadId);
            } else {
                uploadImage($resources, $this->pdf, 'trader-resources/pdf/', "trader-resources-pdf", 'original', 'save', null);
            }
        }

        $resources->update($validatedData);

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
        $model = TraderResource::find($deleteId);

        if ($model->resourceImage) {
            $uploadImageId = $model->resourceImage->id;
            deleteFile($uploadImageId);
        }

        if ($model->resourcePdf) {
            $uploadImageId = $model->resourcePdf->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->resource_id = $id;
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
            'inputAttributes' => ['resource_id' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $resource_id = $data['inputAttributes']['resource_id'];
        $model = TraderResource::find($resource_id);
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
