<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TrackYourProgress extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('track_your_progress', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.track-your-progress');
    }
}
