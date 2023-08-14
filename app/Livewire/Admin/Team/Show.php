<?php

namespace App\Livewire\Admin\Team;

use App\Models\Team;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public  $originalImage;
    public  $originalBrandImage;

    public function mount($team_id)
    {
        $this->details = Team::find($team_id);
        $this->originalImage = $this->details->image_url;
        $this->originalBrandImage = $this->details->brand_image_url;
    }
    public function render()
    {
        return view('livewire.admin.team.show');
    }
}
