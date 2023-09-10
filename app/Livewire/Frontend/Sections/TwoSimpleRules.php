<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class TwoSimpleRules extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('two-simple-rules', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.two-simple-rules');
    }
}
