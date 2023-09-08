<?php

namespace App\Livewire\Frontend\Pages;

use Livewire\Component;

class LearnForexTrading extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('learn-forex-trading', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.learn-forex-trading');
    }
}
