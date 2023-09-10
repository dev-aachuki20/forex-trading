<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class StartTrading extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('start_trading', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.start-trading');
    }
}
