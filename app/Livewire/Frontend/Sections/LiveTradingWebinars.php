<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class LiveTradingWebinars extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('live_trading_webinar', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.live-trading-webinars');
    }
}
