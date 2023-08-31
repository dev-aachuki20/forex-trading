<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class BkForexMembership extends Component
{
    public $localeid;
    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.bk-forex-membership');
    }
}
