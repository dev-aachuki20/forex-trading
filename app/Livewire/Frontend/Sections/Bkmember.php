<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Team;

class Bkmember extends Component
{
    public $tabId;
    public $bkmembers = [], $memebr_type = 2;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->bkmembers = Team::where('language_id', $this->tabId)->where('type', $this->memebr_type)->where('status', 1)->get();
        return view('livewire.frontend.sections.bkmember');
    }
}
