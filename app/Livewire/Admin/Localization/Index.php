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
    public $locid, $value, $key,$values;
    public $sortColumnName = 'serial_no', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['updatePaginationLength'];

    public function render()
    {
        $searchValue = strtolower($this->search);
        $languagedata =  Language::where('status', 1)->get();
        $localization = [];

        $localization = Localization::query()->where(function ($query) use ($searchValue) {
            // $keySearch = \Str::snake($searchValue,'_');

            // $query->where('key', 'like', '%' .$keySearch. '%')*/
            //     ->orWhere('value', 'like', '%' . $searchValue . '%')
            //     ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);

            // dd($searchValue);
            $query->where('value', 'like', '%' . $searchValue . '%')
            ->orWhere('type', 'like', '%' . $searchValue . '%');
        })->where(function ($query){
            $query->where('is_nav_menu',1)->orWhere('status',1);
        });

        $localization = $localization->where('language_id', 1)->whereNotNull('serial_no');
        // if ($this->activeTab) {
        //     $localization = $localization->where('language_id', $this->activeTab);
        // }
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



    public function edit($key)
    {
        $this->values = Localization::where('key', $key)->pluck('value','language_id')->toArray();
        // $this->locid = $id;
        // $this->value = $record->value;
        $this->key = $key;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validateColumns['values.*'] = ['required','string'];

        $this->validate($validateColumns,[],[
            'values.1'=>'value',
            'values.2'=>'value',
            'values.3'=>'value',
        ]);

        foreach($this->values as $langId=>$keyValue){
            Localization::where('key',$this->key)->where('language_id', $langId)->update(['value' => $keyValue]);
        }
        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->resetErrorBag();
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
