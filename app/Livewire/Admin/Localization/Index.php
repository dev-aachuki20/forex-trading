<?php

namespace App\Livewire\Admin\Localization;

use App\Models\Language;
use App\Models\Localization;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;



class Index extends Component
{
    use WithPagination, LivewireAlert;
    public $search = '';
    public $formMode = false, $updateMode = false;
    public $activeTab = 1;
    public $locid, $value, $key;
    public $sortColumnName = 'id', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['updatePaginationLength'];

    public function render()
    {
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();
        $localization = [];

        $localization = Localization::query()->where(function ($query) use ($searchValue) {
            $query->where('key', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        });

        if ($this->activeTab) {
            $localization = $localization->where('language_id', $this->activeTab);
        }
        $localization = $localization->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->paginationLength);
        return view('livewire.admin.localization.index', compact('localization', 'languagedata'));
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



    public function edit($id)
    {
        $record = Localization::where('id', $id)->first();
        $this->locid = $id;
        $this->value = $record->value;
        $this->key = $record->key;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        Localization::where('id', $this->locid)->update(['value' => $this->value]);
        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
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
