<?php

namespace App\Livewire\Frontend\Pages\Aboutus;

use Livewire\Component;

class SurgetraderTeam extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('surgetrader-team', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.aboutus.surgetrader-team');
    }
}
