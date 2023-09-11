<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OurPhilanthropy extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('our_philanthropy', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.our-philanthropy');
    }
}
