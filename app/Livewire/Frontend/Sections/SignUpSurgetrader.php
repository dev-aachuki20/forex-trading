<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;

class SignUpSurgetrader extends Component
{
    public $sectionDetail;
    public $localeid;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('Sign_up_for_the_surgetrader', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.sign-up-surgetrader');
    }
}
