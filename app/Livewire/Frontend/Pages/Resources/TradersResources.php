<?php

namespace App\Livewire\Frontend\Pages\Resources;

use Livewire\Component;

class TradersResources extends Component
{
    public $localeid;
    
    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        return view('livewire.frontend.pages.resources.traders-resources');
    }
}
