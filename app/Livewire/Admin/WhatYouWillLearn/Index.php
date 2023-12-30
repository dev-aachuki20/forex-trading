<?php

namespace App\Livewire\Admin\WhatYouWillLearn;

use App\Models\Language;
use App\Models\WhatYouWillLearn;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;



class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;
    public $data_id = null, $name;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction'
    ];

    public function render()
    {
        $languagedata =  Language::where('status', 1)->get();

        $statusSearch = null;
        $searchValue = $this->search;
        if (Str::contains('active', strtolower($searchValue))) {
            $statusSearch = 1;
        } else if (Str::contains('inactive', strtolower($searchValue))) {
            $statusSearch = 0;
        }

        $alldata = [];
        if ($this->activeTab) {
            $alldata = WhatYouWillLearn::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }


        return view('livewire.admin.what-you-will-learn.index', compact('alldata', 'languagedata'));
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
        $this->reset([
            'name', 'search', 'status',
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
            'name'     => ['required', 'max:255', 'unique:what_you_will_learn,name'],
            'status'   => ['required'],
        ]);

        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;

        WhatYouWillLearn::create($validatedData);

        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $data = WhatYouWillLearn::findOrFail($id);

        $this->name            = $data->name;
        $this->data_id         = $id;
        $this->status          = $data->status;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedArray = [
            'name'            => ['required', 'max:255', /*'unique:news,title,' . $this->news_id*/],
            'status'          => ['required'],
        ];

        $validatedData = $this->validate($validatedArray);
        $validatedData['status'] = $this->status;

        $data = WhatYouWillLearn::find($this->data_id);

        $data->update($validatedData);

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
        $model = WhatYouWillLearn::find($deleteId);

        if ($model->newsImage != null) {
            $uploadImageId = $model->newsImage->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->data_id = $id;
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
            'inputAttributes' => ['dtaId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $dtaId = $data['inputAttributes']['dtaId'];
        $model = WhatYouWillLearn::find($dtaId);
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
}
