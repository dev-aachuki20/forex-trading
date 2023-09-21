<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TradingIndicators extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('trading_indicators', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.trading-indicators');
    }
}
