<?php

namespace App\Livewire\Admin\TradingContestContestants;

use App\Models\Language;
use App\Models\TradingContest;
use App\Models\TradingContestRegistration;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '';
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null, $status = 1;
    public $totalCount = 0;
    public $contest_id = null;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'refreshComponent' => 'render',
    ];

    public function mount($contest_id)
    {
        $contest = TradingContest::findOrFail($contest_id);
        $this->totalCount = $contest->registrations()->count();
    }
    public function render()
    {
        $contestLangId = TradingContest::where('id', $this->contest_id)->value('language_id');
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();
        $allContestants = [];
        if ($contestLangId) {
            $allContestants = TradingContestRegistration::query()->where('language_id', $contestLangId)->where('trading_contest_id', $this->contest_id)->where('deleted_at', null)->where(function ($query) use ($searchValue) {
                $query->where('first_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('last_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('nick_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere('trading_account_no', 'like', '%' . $searchValue . '%')
                    ->orWhere('contact_number', 'like', '%' . $searchValue . '%')
                    ->orWhere('country_name', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }
        return view('livewire.admin.trading-contest-contestants.index', compact('languagedata', 'allContestants'));
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
    public function cancel()
    {
        // $this->formMode = false;
        // $this->updateMode = false;
        // $this->viewMode = false;
        $this->resetValidation();
    }
    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
