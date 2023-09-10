<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Support extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('support', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.support');
    }
}
