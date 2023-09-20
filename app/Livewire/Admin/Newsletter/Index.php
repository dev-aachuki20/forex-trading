<?php

namespace App\Livewire\Admin\Newsletter;

use App\Models\Language;
use App\Models\Newsletter;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $search = '';
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;

    public $languageId;
    public function render()
    {
        $searchValue = $this->search;
        $newsletters = Newsletter::query()
            ->leftJoin('languages', 'newsletters.language_id', '=', 'languages.id')
            ->where(function ($query) use ($searchValue) {
                $query->where('newsletters.email', 'like', '%' . $searchValue . '%')
                    ->orWhere('languages.name', 'like', '%' . $searchValue  . '%')
                    ->orWhereRaw("date_format(newsletters.created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
            ->orderBy('newsletters.created_at', $this->sortDirection)
            ->paginate($this->paginationLength);
        return view('livewire.admin.newsletter.index', compact('newsletters'));
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
