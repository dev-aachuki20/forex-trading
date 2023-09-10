<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class ContactUs extends Component
{
    public $localeid;
    public $pageDetail;
    public $sectionDetail;

    public function mount()
    {
        $this->pageDetail = getPageContent('contact-us', $this->localeid);
        $this->sectionDetail = getSectionContent('get_in_touch', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.contact-us');
    }
}
