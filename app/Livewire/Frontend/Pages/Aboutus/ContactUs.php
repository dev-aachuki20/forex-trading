<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class ContactUs extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('contact-us', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.contact-us');
    }
}
