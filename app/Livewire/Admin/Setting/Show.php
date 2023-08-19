<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Show extends Component
{
    public  $details;
    public  $originalImage, $originalVideo;

    public function mount($settingId)
    {
        $this->details = Setting::find($settingId);
        $this->originalImage = $this->details->image_url;
        $this->originalVideo  = $this->details->video_url;
    }
    public function render()
    {
        return view('livewire.admin.setting.show');
    }
}
