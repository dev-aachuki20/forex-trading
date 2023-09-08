<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class GetFunded extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('get-funded', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.get-funded');
    }
}
