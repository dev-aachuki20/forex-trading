<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class AccelerateFundedTrader extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('accelerate_funded_trader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.accelerate-funded-trader');
    }
}
