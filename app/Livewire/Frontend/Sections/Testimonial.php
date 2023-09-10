<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Testimonial as ModelsTestimonial;
use Livewire\Component;

class Testimonial extends Component
{
    public $testimonials;
    public $localeid;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('What_Our_Traders_Say', $this->localeid);
    }
    public function render()
    {
        $this->testimonials = ModelsTestimonial::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.testimonial');
    }
}
