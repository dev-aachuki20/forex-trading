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
    public $langTab, $lang1, $lang2, $lang3;
    public $showprofileMode = true;
    public $formMode = false;
    public $editprofileMode = false;
    public $profileMode = true;

    public $languageOneMode = true, $languageTwoMode = false, $languageThreeMode = false;

    public function render()
    {
        $this->langTab = Language::where('status', 1)->where('deleted_at', null)->get();
        $this->lang1 = Localization::where('language_id', 1)->get();
        $this->lang2 = Localization::where('language_id', 2)->get();
        $this->lang3 = Localization::where('language_id', 3)->get();


        return view('livewire.admin.localization.index');
    }
}
