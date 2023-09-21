<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class SchoolOfForexTrading extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('school_of_forex_trading', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.school-of-forex-trading');
    }
}
