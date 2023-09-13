<?php

namespace App\Livewire\Admin\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public function mount($affiliate_id)
    {
        $this->details = Affiliate::find($affiliate_id);
        // $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.affiliate.show');
    }
}
