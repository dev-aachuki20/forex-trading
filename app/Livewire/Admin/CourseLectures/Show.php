<?php

namespace App\Livewire\Admin\CourseLectures;

use App\Models\Course;
use App\Models\Lecture;
use Livewire\Component;

class Show extends Component
{
    public $details;

    public function mount($lecture_id)
    {
        $this->details = Lecture::find($lecture_id);
    }
    public function render()
    {
        return view('livewire.admin.course-lectures.show');
    }
}
