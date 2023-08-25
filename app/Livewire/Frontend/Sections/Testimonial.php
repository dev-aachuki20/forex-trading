<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Testimonial as ModelsTestimonial;
use Livewire\Component;

class Testimonial extends Component
{
    public $testimonials;
    public $tabId;
    public function mount()
    {
        $this->tabId = session()->get('active_tab');
    }
    public function render()
    {
        $this->testimonials = ModelsTestimonial::where('language_id', $this->tabId)->where('status', 1)->get();
        return view('livewire.frontend.sections.testimonial');
    }
}
