<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OneImeAudFee extends Component
{
    public $tradeWithUs;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('one_time_aud_fee', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.one-ime-aud-fee');
    }
}
