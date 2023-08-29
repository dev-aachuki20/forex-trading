<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\IncludeManager;
use Livewire\Component;

class Whatincluded extends Component
{
    public $tabId;
    public $includes = [];
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->includes = IncludeManager::where('language_id', $this->tabId)->where('status', 1)->get();
        return view('livewire.frontend.sections.whatincluded');
    }
}
