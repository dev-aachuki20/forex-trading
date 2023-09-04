<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\PartnerLogo;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Partners extends Component
{
    public $partnerslogo;
    public $localeid;

    public function render()
    {
        $this->partnerslogo = PartnerLogo::where('language_id', $this->localeid)->where('status', 1)->orWhere('language_id', null)->get();
        return view('livewire.frontend.sections.partners');
    }
}
