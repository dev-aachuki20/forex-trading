<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TechProfit extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('tech_profits', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.tech-profit');
    }
}
