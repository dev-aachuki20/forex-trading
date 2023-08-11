<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public  $originalImage;

    public function mount($testimonial_id){
        $this->details = Testimonial::find($testimonial_id);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.testimonial.show');
    }
}
