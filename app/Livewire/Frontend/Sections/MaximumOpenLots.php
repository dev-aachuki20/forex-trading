<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class MaximumOpenLots extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('max-open-lots', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.maximum-open-lots');
    }
}
