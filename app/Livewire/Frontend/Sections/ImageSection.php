<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class ImageSection extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('trading_rule_image_section', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
       
    }
    public function render()
    {
        return view('livewire.frontend.sections.image-section');
    }
}
