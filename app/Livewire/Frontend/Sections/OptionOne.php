<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OptionOne extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('option-one', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.option-one');
    }
}
