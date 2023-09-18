<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use App\Models\Gallery;
use Livewire\Component;

class AboutSurgetrader extends Component
{
    public $localeid;
    public $pageDetail;
    public $galleries;

    public function mount()
    {
        $this->pageDetail = getPageContent('about-surgetrader', $this->localeid);
        $this->galleries = Gallery::where('language_id', $this->localeid)->orWhereNull('language_id')->where('status',1)->get();
    }

    public function render()
    {
        return view('livewire.frontend.pages.aboutus.about-surgetrader');
    }
}
