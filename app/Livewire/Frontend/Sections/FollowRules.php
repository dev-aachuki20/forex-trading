<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class FollowRules extends Component
{
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('follow-rules', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.follow-rules');
    }
}
