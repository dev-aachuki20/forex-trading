<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class HomeBanner extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('home', $this->localeid);
        if(is_null($this->pageDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.home-banner');
    }
}
