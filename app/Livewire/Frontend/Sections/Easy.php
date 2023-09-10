<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Easy extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('easy', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.easy');
    }
}
