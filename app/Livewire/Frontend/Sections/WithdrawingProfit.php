<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class WithdrawingProfit extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('withdrawing-profits', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.withdrawing-profit');
    }
}
