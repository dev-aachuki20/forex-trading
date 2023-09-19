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
        // $newsletters = Newsletter::query();
        $searchValue = $this->search;
        // $language = Language::where('name', 'like', '%' . $searchValue . '%')->first();
        // $this->languageId = $language->id;
        $newsletters = Newsletter::query()->where(function ($query) use ($searchValue) {
            $query->where('email', 'like', '%' . $searchValue . '%')
                // ->orWhere('language_id', 'like', '%' . $this->languageId . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })
            ->orderBy($this->sortColumnName, $this->sortDirection)
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
