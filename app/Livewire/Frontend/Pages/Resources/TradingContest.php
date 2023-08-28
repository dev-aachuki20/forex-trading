<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class TradingContest extends Component
{
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.trading-contest');
    }
}
