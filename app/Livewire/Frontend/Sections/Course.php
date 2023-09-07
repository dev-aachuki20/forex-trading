<?php

namespace App\Livewire\Frontend\Sections;

use Livewire\Component;
use App\Models\Course as CourseModel;

class Course extends Component
{
    public $localeid;
    public $courses = [];

    public function render()
    {
        $this->courses = CourseModel::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.course');
    }
}
