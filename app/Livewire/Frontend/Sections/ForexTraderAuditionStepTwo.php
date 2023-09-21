<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class ForexTraderAuditionStepTwo extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('forex-trader-audition-step-two', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }

    public function render()
    {
        return view('livewire.frontend.sections.forex-trader-audition-step-two');
    }
}
