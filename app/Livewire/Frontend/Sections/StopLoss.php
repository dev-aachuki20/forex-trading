<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class StopLoss extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('stop-loss', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.stop-loss');
    }
}
