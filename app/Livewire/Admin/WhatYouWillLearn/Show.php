<?php

namespace App\Livewire\Admin\WhatYouWillLearn;

use App\Models\WhatYouWillLearn;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public function mount($id)
    {
        $this->details = WhatYouWillLearn::find($id);
    }
    public function render()
    {
        return view('livewire.admin.what-you-will-learn.show');
    }
}
