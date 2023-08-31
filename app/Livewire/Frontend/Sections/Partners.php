<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\PartnerLogo;
use Livewire\Component;

class Partners extends Component
{
    public $partnerslogo;
    public $localeid;

    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        $this->partnerslogo = PartnerLogo::where('language_id', $this->localeid)->orWhere('language_id', null)->where('status', 1)->get();
        return view('livewire.frontend.sections.partners');
    }
}
