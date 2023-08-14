<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public  $originalImage;
    public function mount($news_id)
    {
        $this->details = News::find($news_id);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.news.show');
    }
}
