<?php

namespace App\Livewire\Admin\TraderResources;

use App\Models\TraderResource;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public $originalPdf;

    public function mount($resource_id)
    {
        $this->details = TraderResource::find($resource_id);
    }

    public function render()
    {
        return view('livewire.admin.trader-resources.show');
    }
}
