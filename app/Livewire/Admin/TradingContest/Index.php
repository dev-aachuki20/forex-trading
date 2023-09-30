<?php

namespace App\Livewire\Admin\TradingContest;

use App\Models\Language;
use App\Models\TradingContest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
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

    public $contest_id = null, $title, $start_date_time, $end_date_time;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
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

        $allContest = [];
        if ($this->activeTab) {
            $allContest = TradingContest::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.trading-contest.index', compact('allContest', 'languagedata'));
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
        $this->languageId = $this->activeTab;
        $this->reset([
            'title', 'start_date_time',  'end_date_time', 'search', 'status'
        ]);
        $this->initializePlugins();
        $this->dispatch('changelangStatus', ['activeTab' => $this->activeTab]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetValidation();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title'           => ['required', 'string', 'max:100', Rule::unique('trading_contests')->whereNull('deleted_at')],
            // 'title'           => 'required|unique:trading_contests,title,Null,deleted_at|max:' . config('constants.titlelength'),
            'start_date_time' => 'required|date|after:now',
            'end_date_time'   => 'required|date|after:start_date_time',
            'status'          => 'required',
        ]);

        $validatedData['language_id'] = $this->languageId;
        TradingContest::create($validatedData);
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $contest = TradingContest::findOrFail($id);
        $this->title           = $contest->title;
        $this->contest_id      = $id;
        $this->start_date_time = $contest->start_date_time;
        $this->end_date_time   = $contest->end_date_time;
        $this->status          = $contest->status;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {

        $validatedData = $this->validate([
            'title'           => ['required', 'string', 'max:100', Rule::unique('trading_contests')->whereNull('deleted_at')->ignore($this->contest_id, 'id')],
            'start_date_time' => 'required|date|after:now',
            'end_date_time'   => 'required|date|after:start_date_time',
            'status'          => 'required',
        ]);
        $validatedData['status'] = $this->status;

        $contest = TradingContest::find($this->contest_id);
        $contest->update($validatedData);
        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->contest_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
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
        $model = TradingContest::find($deleteId);
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
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['contestID' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $contestID = $data['inputAttributes']['contestID'];
        $model = TradingContest::find($contestID);
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
