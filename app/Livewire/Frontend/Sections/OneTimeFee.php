<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OneTimeFee extends Component
{
    
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('one-time-fee', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.one-time-fee');
    }
}
