<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Team;


class Instgrammember extends Component
{
    public $localeid;
    public $instagramMembers = [], $memebr_type = 3;

    public function render()
    {
        $this->instagramMembers = Team::where('language_id', $this->localeid)->where('type', $this->memebr_type)->where('status', 1)->get();
        return view('livewire.frontend.sections.instgrammember');
    }
}
