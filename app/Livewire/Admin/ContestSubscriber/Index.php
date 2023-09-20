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
        // $contestSubscriber = Newsletter::query();
        $searchValue = $this->search;
        // $language = Language::where('name', 'like', '%' . $searchValue . '%')->first();
        // $this->languageId = $language->id;
        $contestSubscriber = ContestSubscriber::query()->where(function ($query) use ($searchValue) {
            $query->where('subscriber_email', 'like', '%' . $searchValue . '%')
                ->orWhere('phone_number', 'like', '%' . $searchValue  . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })
            ->orderBy($this->sortColumnName, $this->sortDirection)
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
