<?php

namespace App\Livewire\Admin\TradingContestRule;

use App\Livewire\Frontend\Pages\Resources\TradingContest;
use App\Models\Language;
use App\Models\TradingContestRules;
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
    public $contest_id;
    public $rule_id = null, $instruction;

    public $title, $description;

    protected $listeners = [
        'updatedContent', 'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
    ];

    public function render()
    {
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();

        $allContestRule = [];
        if ($this->activeTab) {
            $allContestRule = TradingContestRules::query()->where('language_id', $this->activeTab)->where('trading_contest_id', $this->contest_id)->whereNull('deleted_at')->where(function ($query) use ($searchValue) {
                $query->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('description', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.trading-contest-rule.index', compact('allContestRule', 'languagedata'));
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
            'title', 'description', 'search'
        ]);
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
            "title" =>  ['required', 'max:' . config('constants.titlelength')],
            "description" => 'required',
        ]);
        $validatedData['language_id'] = $this->languageId;
        $validatedData['trading_contest_id'] = $this->contest_id;
        TradingContestRules::create($validatedData);
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $contestRule = TradingContestRules::findOrFail($id);
        $this->rule_id         = $id;
        $this->title           = $contestRule->title;
        $this->description     = $contestRule->description;
        // $this->status          = $contestRule->status;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title'           => 'required|max:' . config('constants.titlelength'),
            'description'     => 'required',
            // 'status'          => 'required',
        ]);
        // $validatedData['status'] = $this->status;

        $contestrules = TradingContestRules::find($this->rule_id);
        $contestrules->update($validatedData);
        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->rule_id = $id;
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
        $model = TradingContestRules::find($deleteId);
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
