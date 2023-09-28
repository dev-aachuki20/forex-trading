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

        $profit = getSectionContent('profit', $this->localeid);
        $easy = getSectionContent('easy', $this->localeid);
        $fast = getSectionContent('fast', $this->localeid);
        $support = getSectionContent('support', $this->localeid);

        // if(is_null($this->sectionDetail) && is_null($profit) && is_null($easy) && is_null($fast) && is_null($support)){
        //     $this->skipRender(); 
        // }

        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.withdrawing-profit');
    }
}
