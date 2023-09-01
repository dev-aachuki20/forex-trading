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
        $this->partnerslogo = PartnerLogo::where('language_id', $this->localeid)->orWhere('language_id', null)->where('status', 1)->get();
        return view('livewire.frontend.sections.partners');
    }
}
