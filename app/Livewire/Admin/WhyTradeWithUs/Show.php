<?php

namespace App\Livewire\Admin\WhyTradeWithUs;

use App\Models\WhyTradeWithUs;
use Livewire\Component;

class Show extends Component
{
    public  $details;
    public  $originalImage;

    public function mount($tradeId)
    {
        $this->details = WhyTradeWithUs::find($tradeId);
        $this->originalImage = $this->details->image_url;
    }

    public function render()
    {
        return view('livewire.admin.why-trade-with-us.show');
    }
}
