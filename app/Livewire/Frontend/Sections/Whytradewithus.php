<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\WhyTradeWithUs as ModelsWhyTradeWithUs;
use Livewire\Component;

class Whytradewithus extends Component
{
    public $tradeWithUs;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('why_trade_with_us', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.whytradewithus');
    }
}
