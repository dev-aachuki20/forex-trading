<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class BkForexMembership extends Component
{
    public $localeid;
    public $pageDetail;

    public function mount()
    {
        $this->pageDetail = getPageContent('bk-forex-membership', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.bk-forex-membership');
    }
}
