<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class AboutSurgetrader extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('about-surgetrader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.about-surgetrader');
    }
}
