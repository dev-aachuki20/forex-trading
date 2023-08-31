<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class TradableAssets extends Component
{
    public $localeid;
    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.tradable-assets');
    }
}
