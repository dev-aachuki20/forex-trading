<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class TradersResources extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('traders-resources', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.traders-resources');
    }
}
