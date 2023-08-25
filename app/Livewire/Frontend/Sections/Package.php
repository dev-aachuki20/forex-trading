<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Package as Packages;

class Package extends Component
{
    public $packages;
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->packages = Packages::where('language_id', $this->tabId)->where('status',1)->get();
        return view('livewire.frontend.sections.package');
    }
}
