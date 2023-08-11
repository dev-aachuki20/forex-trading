<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class Show extends Component
{
    public $details;
    public  $originalImage;
    public function mount($blog_id)
    {
        $this->details = Blog::find($blog_id);
        $this->originalImage = $this->details->image_url;
    }
    public function render()
    {
        return view('livewire.admin.blog.show');
    }
}
