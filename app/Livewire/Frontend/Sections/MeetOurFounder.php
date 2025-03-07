<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class MeetOurFounder extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('meet_our_founder', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.meet-our-founder');
    }
}
