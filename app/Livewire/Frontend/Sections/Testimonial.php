<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Testimonial as ModelsTestimonial;
use Livewire\Component;

class Testimonial extends Component
{
    public $testimonials;
    public $localeid;
    public function mount()
    {
        $this->localeid = app('localeid');
    }
    public function render()
    {
        $this->testimonials = ModelsTestimonial::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.testimonial');
    }
}
