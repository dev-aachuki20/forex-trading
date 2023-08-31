<?php

namespace App\Livewire\Frontend\Pages;

use Livewire\Component;

class Affiliate extends Component
{
    public $localeid;

    public function mount(){
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.pages.affiliate');
    }
}
