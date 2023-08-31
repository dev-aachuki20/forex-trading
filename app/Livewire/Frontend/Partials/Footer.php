<?php

namespace App\Livewire\Frontend\Partials;

use Livewire\Component;

class Footer extends Component
{
    public $localeid;

    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.partials.footer');
    }
}
