<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\FeaturedManager;

class Features extends Component
{
    public $features;
    public $tabId;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->features = FeaturedManager::where('status', 1)->where('language_id', $this->tabId)->get();
        return view('livewire.frontend.sections.features');
    }
}
