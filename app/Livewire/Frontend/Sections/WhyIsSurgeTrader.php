<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class WhyIsSurgeTrader extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('why_is_surgeTrader', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.why-is-surge-trader');
    }
}
