<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class TradingContest extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('trading-contest', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.trading-contest');
    }
}
