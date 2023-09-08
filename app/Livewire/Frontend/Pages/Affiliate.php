<?php

namespace App\Livewire\Frontend\Pages;

use Livewire\Component;

class Affiliate extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('affiliate', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.affiliate');
    }
}
