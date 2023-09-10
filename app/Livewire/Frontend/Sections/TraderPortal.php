<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TraderPortal extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('trader-portal', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.trader-portal');
    }
}
