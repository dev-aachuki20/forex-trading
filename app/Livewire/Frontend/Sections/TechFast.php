<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TechFast extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('tech_fast', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.tech-fast');
    }
}
