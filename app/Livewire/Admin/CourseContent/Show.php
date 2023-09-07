<?php

namespace App\Livewire\Admin\CourseContent;

use App\Models\Content;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public function mount($content_id)
    {
        $this->details = Content::find($content_id);
    }
    public function render()
    {
        return view('livewire.admin.course-content.show');
    }
}
