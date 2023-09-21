<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class BestAffiliateFee extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('best_affiliate_fees', $this->localeid);

        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.best-affiliate-fee');
    }
}
