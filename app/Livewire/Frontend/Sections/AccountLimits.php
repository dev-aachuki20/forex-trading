<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class AccountLimits extends Component
{
    
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('account-limits', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.account-limits');
    }
}
