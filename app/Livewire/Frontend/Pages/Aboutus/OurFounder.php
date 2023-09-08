<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class OurFounder extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('our-founder', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.our-founder');
    }
}
