<?php

namespace App\Livewire\Admin\PartnerLogo;

use Livewire\Component;
use App\Models\PartnerLogo;

class Show extends Component
{
    public $details;
    public  $originalImage;

    public function mount($partnerLogoId)
    {
        $this->details = PartnerLogo::find($partnerLogoId);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.partner-logo.show');
    }
}
