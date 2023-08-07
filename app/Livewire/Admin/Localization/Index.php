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
    public $activeTab = 'english';

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
    }

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;

        
        $this->langTab = Language::where('status', 1)->where('deleted_at', null)->get();

        $languageOne = Localization::query()->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('language_id', 1)->where('key', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);

        $languageTwo = Localization::query()->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('language_id', 2)->where('key', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);

        $languageThree = Localization::query()->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('language_id', 3)->where('key', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);





        // $this->langTab = Language::where('status', 1)->where('deleted_at', null)->get();
        // $languageOne = Localization::where('language_id', 1)->paginate(10); //english
        // $languageTwo = Localization::where('language_id', 2)->paginate(10); //japanese
        // $languageThree = Localization::where('language_id', 3)->paginate(10); //thai

        return view('livewire.admin.localization.index', compact('languageOne', 'languageTwo', 'languageThree'));
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
    }

    private function resetInputFields()
    {
        $this->value = '';
    }

    // public function search()
    // {
    //     dd('sdjk');
    //     $this->search = $this->input('search');

    //     $this->emit('search', $this->search);
    // }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
