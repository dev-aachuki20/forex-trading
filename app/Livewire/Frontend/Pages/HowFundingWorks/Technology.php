<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class Technology extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('technology', $this->localeid);
    } 
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.technology');
    }
}
