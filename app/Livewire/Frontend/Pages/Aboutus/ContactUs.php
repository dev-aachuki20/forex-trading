<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class ContactUs extends Component
{
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.contact-us');
    }
}
