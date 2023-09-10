<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class EarnMoreTradingActivity extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('earn-more-trading-activity', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.earn-more-trading-activity');
    }
}
