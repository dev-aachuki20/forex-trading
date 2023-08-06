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
    public $langTab, $lang1, $lang2, $lang3;

    public $showprofileMode = true;
    public $formMode = false;
    public $editprofileMode = false;
    public $profileMode = true;

    public $updateMode = false;
    public $locid, $keyname;

    public $languageOneMode = true, $languageTwoMode = false, $languageThreeMode = false;
    public $activeTab = 'english';

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $this->langTab = Language::where('status', 1)->where('deleted_at', null)->get();
        $this->lang1 = Localization::where('language_id', 1)->get();
        $this->lang2 = Localization::where('language_id', 2)->get();
        $this->lang3 = Localization::where('language_id', 3)->get();


        return view('livewire.admin.localization.index');
    }

    public function edit($id)
    {
        $record = Localization::where('id', $id)->first();
        $this->locid = $id;
        $this->keyname = $record->name;
        $this->updateMode = true;
    }

    public function update(){
        dd('update');
    }

    public function cancel()
    {
        $this->updateMode = false;
    }
}
