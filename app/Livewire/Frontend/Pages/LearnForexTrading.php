<?php

namespace App\Livewire\Frontend\Pages;

use Livewire\Component;

class LearnForexTrading extends Component
{
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        return view('livewire.frontend.pages.learn-forex-trading');
    }
}
