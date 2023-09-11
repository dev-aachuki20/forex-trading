<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class DisciplinedTrader extends Component
{
    public $localeid;
    public $sectionDetail;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('disciplined_trader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.disciplined-trader');
    }
}
