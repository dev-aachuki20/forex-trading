<?php

namespace App\Livewire\Admin\IncludeManager;

use App\Models\IncludeManager;
use Livewire\Component;

class Show extends Component
{
    public  $details;
    public  $originalImage;

    public function mount($incId)
    {
        $this->details = IncludeManager::find($incId);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.include-manager.show');
    }
}
