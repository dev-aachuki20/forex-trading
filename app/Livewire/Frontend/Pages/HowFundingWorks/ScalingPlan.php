<?php

namespace App\Livewire\Frontend\Pages\HowFundingWorks;

use Livewire\Component;

class ScalingPlan extends Component
{
    public $localeid;
    public $pageDetail;
    public function mount()
    {
        $this->pageDetail = getPageContent('scaling-plan', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.pages.how-funding-works.scaling-plan');
    }
}
