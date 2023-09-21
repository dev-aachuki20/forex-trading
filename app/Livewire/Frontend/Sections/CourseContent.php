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
    public $sectionDetail;

    public function mount()
    {
        $this->sectionDetail = getSectionContent('course_content', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        $course = Course::find($this->courseID);

        if ($course) {
            $this->courseContent = $this->course->content;
        }
        return view('livewire.frontend.sections.course-content');
    }
}
