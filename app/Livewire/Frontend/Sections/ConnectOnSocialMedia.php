<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class ConnectOnSocialMedia extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('connect_on_socail_media', $this->localeid);

        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.connect-on-social-media');
    }
}
