<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class BkForexMembership extends Component
{
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.bk-forex-membership');
    }
}
