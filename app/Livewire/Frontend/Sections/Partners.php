<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\PartnerLogo;
use Livewire\Component;

class Partners extends Component
{
    public $partnerslogo;
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->partnerslogo = PartnerLogo::where('language_id', $this->tabId)->where('status', 1)->get();
        return view('livewire.frontend.sections.partners');
    }
}
