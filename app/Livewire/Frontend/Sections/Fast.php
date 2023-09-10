<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Fast extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('fast', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.fast');
    }
}
