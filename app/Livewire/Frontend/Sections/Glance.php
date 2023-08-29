<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Glance as ModelsGlance;
use Livewire\Component;

class Glance extends Component
{
    public $tabId;
    public $glanceRecord = [];

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->glanceRecord = ModelsGlance::where('language_id', $this->tabId)->where('status', 1)->get();
        return view('livewire.frontend.sections.glance');
    }
}
