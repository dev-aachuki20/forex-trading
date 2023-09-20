<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Edit extends Component
{
    public $sectionDetails;

    public function mount($page_key){
        $this->sectionDetails = Setting::whereJsonContains('page_keys',$page_key)->get();
    }

    public function render()
    {
        return view('livewire.admin.setting.edit');
    }
}
