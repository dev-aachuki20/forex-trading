<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class TradingRules extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('trading-rules', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.trading-rules');
    }
}
