<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Chatroom extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('chatroom', $this->localeid);

        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.chatroom');
    }
}
