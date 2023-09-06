<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public function mount($course_id)
    {
        $this->details = Course::find($course_id);
    }
    public function render()
    {
        return view('livewire.admin.courses.show');
    }
}
