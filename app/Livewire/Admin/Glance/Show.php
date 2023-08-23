<?php

namespace App\Livewire\Admin\Glance;

use App\Models\Glance;
use Livewire\Component;

class Show extends Component
{
    public  $details;
    public  $originalImage;

    public function mount($glanceId)
    {
        $this->details = Glance::find($glanceId);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.glance.show');
    }
}
