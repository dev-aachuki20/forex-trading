<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class Limits extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('account-limits', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.limits');
    }
}
