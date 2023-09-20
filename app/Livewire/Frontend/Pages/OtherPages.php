<?php

namespace App\Livewire\Frontend\Pages;

use Livewire\Component;

class OtherPages extends Component
{
    public $pageDetail,$sectionDetail;

    public function mount($pageName,$localeid)
    {
        $this->pageDetail = getPageContent($pageName, $localeid);
        $this->sectionDetail = getSectionContent(str_replace('-','_',$pageName), $localeid);
    }

    public function render()
    {
        return view('livewire.frontend.pages.other-pages');
    }
}
