<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Team;

class Bkmember extends Component
{
    public $localeid;
    // public $tabId;
    public $bkmembers = [], $memebr_type = 2;
    // public function mount()
    // {
    //     // $this->tabId = session()->get('active_tab');
    //     $this->localeid = app('localeid');
    // }
    public function render()
    {
        $this->bkmembers = Team::where('language_id', $this->localeid)->where('type', $this->memebr_type)->where('status', 1)->get();
        return view('livewire.frontend.sections.bkmember');
    }
}
