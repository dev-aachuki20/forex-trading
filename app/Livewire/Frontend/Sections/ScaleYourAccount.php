<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class ScaleYourAccount extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('scale_your_account', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.scale-your-account');
    }
}
