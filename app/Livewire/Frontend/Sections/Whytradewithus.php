<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\WhyTradeWithUs as ModelsWhyTradeWithUs;
use Livewire\Component;

class Whytradewithus extends Component
{
    public $tradeWithUs;
    public $localeid;
    public function render()
    {
        $this->tradeWithUs = ModelsWhyTradeWithUs::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.whytradewithus');
    }
}
