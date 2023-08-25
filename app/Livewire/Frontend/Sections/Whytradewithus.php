<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\WhyTradeWithUs as ModelsWhyTradeWithUs;
use Livewire\Component;

class Whytradewithus extends Component
{
    public $tradeWithUs;
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->tradeWithUs = ModelsWhyTradeWithUs::where('language_id', $this->tabId)->where('status', 1)->get();
        return view('livewire.frontend.sections.whytradewithus');
    }
}
