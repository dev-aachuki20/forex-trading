<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class ContactUs extends Component
{
    public $localeid;
    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.contact-us');
    }
}
