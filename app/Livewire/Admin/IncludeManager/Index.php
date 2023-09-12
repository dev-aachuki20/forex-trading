<?php

namespace App\Livewire\Admin\IncludeManager;

use Livewire\Component;
use App\Models\IncludeManager;
use App\Models\Language;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Index extends Component
{

    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public  $activeTab = 1;
    public  $incId, $title, $description, $image, $originalImage, $status = 1;
    public  $languageId = null;
    public  $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];


    public function render()
    {
        $searchValue = $this->search;

        $languagedata =  Language::where('status', 1)->get();

        $incRecords = [];
        if ($this->activeTab) {
            $incRecords = IncludeManager::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')->orWhere('description', 'like', '%' . $searchValue . '%')->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.include-manager.index', compact('incRecords', 'languagedata'));
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

    public function create()
    {
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
        $this->reset([
            'image', 'originalImage', 'description', 'title', 'search', 'status'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title'           => 'required|max:' . config('constants.titlelength'),
            'description'     => 'required|max:' . config('constants.textlength'),
            'status'          => 'required',
            'image'           => 'required|file|mimes:svg',
            // required|file|mimes:svg|max:3145728
        ], [
            // 'image.required' => 'The image field is required.',
            'image.mimes' => 'The image must be an SVG file.',
        ]);

        $validatedData['language_id'] = $this->languageId;

        $includeManager = IncludeManager::where('deleted_at', null)->where('title', $this->title)->first();
        if (!$includeManager) {
            $records = IncludeManager::create($validatedData);

            // upload the image
            if ($this->image != null) {
                uploadImage($records, $this->image, 'include-manager/images/', "include-manager-image", 'original', 'save', null);
            }

            $this->formMode = false;
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Title already exist');
        }
    }

    public function edit($id)
    {
        $record = IncludeManager::where('id', $id)->where('deleted_at', null)->first();
        $this->incId         = $id;
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
            'description'  => 'required|max:' . config('constants.textlength'),
            'status'       => 'required',
            'image'        => 'required|file|mimes:svg',

        ], [
            // 'image.required' => 'The image field is required.',
            'image.mimes' => 'The image must be an SVG file.',
        ]);
        $records = IncludeManager::find($this->incId);


        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $records->includeManagerImage->id;
            uploadImage($records, $this->image, 'include-manager/images/', "include-manager-image", 'original', 'update', $uploadId);
        }

        IncludeManager::where('id', $this->incId)->update($validatedData);
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
        $model = IncludeManager::find($delid);
        if ($model->includeManagerImage) {
            $uploadImageId = $model->includeManagerImage->id;
            deleteFile($uploadImageId);
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
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['incID' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $incID = $data['inputAttributes']['incID'];
        $model = IncludeManager::find($incID);
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
        $this->incId    = $id;
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
