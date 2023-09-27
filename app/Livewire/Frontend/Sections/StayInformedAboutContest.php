<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class StayInformedAboutContest extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('stay-informed-about-contest', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.stay-informed-about-contest');
    }
}
