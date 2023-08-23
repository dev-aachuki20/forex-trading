<?php

namespace App\Livewire\Admin\Page;

use Livewire\Component;
use App\Models\Page;

class Show extends Component
{
    public $details;
    public  $originalImage;
    public function mount($page_id)
    {
        $this->details = Page::find($page_id);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.page.show');
    }
}
