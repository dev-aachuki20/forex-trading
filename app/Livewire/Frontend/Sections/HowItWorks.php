<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class HowItWorks extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('how-it-works', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.how-it-works');
    }
}
