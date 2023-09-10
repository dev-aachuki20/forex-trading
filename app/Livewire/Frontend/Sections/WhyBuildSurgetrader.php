<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class WhyBuildSurgetrader extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('why_build_surgetrader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.why-build-surgetrader');
    }
}
