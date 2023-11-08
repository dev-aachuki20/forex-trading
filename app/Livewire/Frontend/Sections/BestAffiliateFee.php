<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class BestAffiliateFee extends Component
{
    public $sectionDetail, $sectionDetailOne, $sectionDetailTwo, $sectionDetailThree;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('best_affiliate_fees', $this->localeid);

        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }

        $this->sectionDetailOne = getSectionContent('affiliate_receive_commission', $this->localeid);
        $this->sectionDetailTwo = getSectionContent('affiliate_high_value_transactions', $this->localeid);
        $this->sectionDetailThree = getSectionContent('affiliate_regular_payouts', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.best-affiliate-fee');
    }
}
