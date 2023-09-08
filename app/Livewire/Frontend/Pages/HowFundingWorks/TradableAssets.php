<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class TradableAssets extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('tradable-assets', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.tradable-assets');
    }
}
