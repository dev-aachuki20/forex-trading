<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class OurCompanyWork extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('our-company-works', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.our-company-work');
    }
}
