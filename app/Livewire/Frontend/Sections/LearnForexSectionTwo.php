<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class LearnForexSectionTwo extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('learn_forex_section_2', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.learn-forex-section-two');
    }
}
