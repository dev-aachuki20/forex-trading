<?php

namespace App\Livewire\Admin\PackageManager;

use App\Models\Package;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public function mount($packageId)
    {
        $this->details = Package::find($packageId);
    }
    public function render()
    {
        return view('livewire.admin.package-Manager.show');
    }
}
