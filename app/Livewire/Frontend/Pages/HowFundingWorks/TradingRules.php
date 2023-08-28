<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class TradingRules extends Component
{
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.trading-rules');
    }
}
