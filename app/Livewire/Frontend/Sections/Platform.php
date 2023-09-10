<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Platform extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('platform', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.platform');
    }
}
