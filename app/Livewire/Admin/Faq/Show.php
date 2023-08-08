<?php

namespace App\Livewire\Admin\Faq;

use Livewire\Component;
use App\Models\Faq;

class Show extends Component
{
    public $details;
    public  $originalImage, $originalVideo;

    public function mount($faqId){
        $this->details = Faq::find($faqId);
        $this->originalImage = $this->details->image_url;
        $this->originalVideo  = $this->details->faq_video_url;
    }
    public function render()
    {
        return view('livewire.admin.faq.show');
    }
}
