<?php

namespace App\Livewire\Admin\FeaturedManage;

use App\Models\FeaturedManager;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public $originalImage;
    public $originalPdf;
    public function mount($feature_id)
    {
        $this->details = FeaturedManager::find($feature_id);
        $this->originalImage = $this->details->image_url;
        $this->originalPdf   = $this->details->pdf_url;
    }
    public function render()
    {
        return view('livewire.admin.featured-manage.show');
    }
}
