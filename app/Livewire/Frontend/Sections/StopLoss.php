<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class StopLoss extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('stop-loss', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.stop-loss');
    }
}
