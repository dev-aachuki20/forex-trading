<?php

namespace App\Livewire\Admin\ContestSubscriber;

use App\Models\ContestSubscriber;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $search = '';
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;


    public function render()
    {
        $searchValue = $this->search;

        $contestSubscriber = ContestSubscriber::query()
            ->leftJoin('languages', 'contest_subscribers.language_id', '=', 'languages.id')
            ->where(function ($query) use ($searchValue) {
                $query->where('contest_subscribers.subscriber_email', 'like', '%' . $searchValue . '%')
                    ->orWhere('contest_subscribers.phone_number', 'like', '%' . $searchValue  . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchValue  . '%')
                    ->orWhereRaw("date_format(contest_subscribers.created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
            ->orderBy('contest_subscribers.created_at', $this->sortDirection)
            ->paginate($this->paginationLength);

        return view('livewire.admin.contest-subscriber.index', compact('contestSubscriber'));
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

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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
