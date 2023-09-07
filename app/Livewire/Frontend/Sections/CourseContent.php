<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Content;
use App\Models\Lecture;
use App\Models\Course;
use Livewire\Component;

class CourseContent extends Component
{
    public $localeid;
    public $courseContent = [];
    public $courseLecture = [];
    public $courseID = 1;
    public $totalLecture = 0;

    public function render()
    {
        $course = Course::find($this->courseID);
        $this->courseContent = $course->content;

        // foreach ($this->courseContent as $contentdata) {
        //     $this->courseLecture = $contentdata->lecture;
        //     $this->totalLecture = $this->courseLecture->count();
        // }


        // $this->courseContent = Content::where('language_id', $this->localeid)->where('course_id', $this->courseID)->where('status', 1)->get();
        return view('livewire.frontend.sections.course-content');
    }
}
