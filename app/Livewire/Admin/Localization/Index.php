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
    public $langTab;

    public $updateMode = false;
    public $locid, $value;
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    protected $listeners = ['updatePaginationLength'];

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

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;


        $this->langTab = Language::where('status', 1)->where('deleted_at', null)->get();

        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $localization = [];
        if ($this->activeTab == $getlangId) {
            $localization = Localization::query()->where('language_id', $getlangId)->where(function ($query) use ($searchValue) {
                $query->where('key', 'like', '%' . $searchValue . '%')
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.localization.index', compact('localization'));
    }

    public function edit($id)
    {
        $record = Localization::where('id', $id)->first();
        $this->locid = $id;
        $this->value = $record->value;
        $this->updateMode = true;
    }

    public function update()
    {
        Localization::where('id', $this->locid)->update(['value' => $this->value]);
        $this->flash('success',  getLocalization('updated_success'));
        $this->resetInputFields();
        return redirect()->route('auth.localization');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->value = '';
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
