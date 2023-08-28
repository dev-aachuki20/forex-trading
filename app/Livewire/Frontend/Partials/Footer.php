<?php

namespace App\Livewire\Frontend\Partials;

use Livewire\Component;

class Footer extends Component
{
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.partials.footer');
    }
}
