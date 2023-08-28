<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    public $faqsrecords;
    public $tabId;
    public $selectedCategory = 1;

    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }

    public function selectCategory($key)
    {
        $this->selectedCategory = $key;
    }

    public function render()
    {
        $this->faqsrecords = ModelsFaq::where('language_id', $this->tabId)->where('status', 1)->orderBy('faq_type', 'asc')->get()->groupBy('faq_type');
        return view('livewire.frontend.pages.faq');
    }
}
