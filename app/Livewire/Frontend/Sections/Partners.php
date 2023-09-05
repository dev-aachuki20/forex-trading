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
        // $this->partnerslogo = PartnerLogo::where('language_id', $this->localeid)->where('status', 1)->orWhere('language_id', null)->get();
        $this->partnerslogo = PartnerLogo::where('status', 1)
            ->where(function ($query) {
                $query->where('language_id', $this->localeid)
                    ->orWhereNull('language_id');
            })->get();
        return view('livewire.frontend.sections.partners');
    }
}
