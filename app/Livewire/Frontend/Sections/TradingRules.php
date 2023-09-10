<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TradingRules extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('trading-rules', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.trading-rules');
    }
}
