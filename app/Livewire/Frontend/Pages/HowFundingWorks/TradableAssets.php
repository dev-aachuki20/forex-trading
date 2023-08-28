<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class TradableAssets extends Component
{
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.tradable-assets');
    }
}
