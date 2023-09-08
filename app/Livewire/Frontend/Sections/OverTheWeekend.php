<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OverTheWeekend extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('over-the-weekend', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.over-the-weekend');
    }
}
