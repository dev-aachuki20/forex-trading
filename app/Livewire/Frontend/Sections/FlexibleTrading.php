<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class FlexibleTrading extends Component
{
    public $tradeWithUs;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('flexible_trading', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.flexible-trading');
    }
}
