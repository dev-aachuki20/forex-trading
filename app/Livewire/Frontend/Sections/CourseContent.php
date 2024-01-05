<?php

namespace App\Livewire\Frontend\Sections;

use App\Models\Content;
use App\Models\Lecture;
use App\Models\Course;
use Livewire\Component;

class CourseContent extends Component
{
    // public $course;
    public $localeid;
    // public $courseContent = [];
    public $courses = [];
    // public $courseLecture = [];
    // public $courseID = 1;
    public $totalLecture = 0;
    public $sectionDetail;

    public $lectureRecord, $lectureRecordVideo, $lectureImage;
    protected $listeners = ['previewLecture'];

    public function mount()
    {
        $this->sectionDetail = getSectionContent('course_content', $this->localeid);
        if (is_null($this->sectionDetail)) {
            $this->skipRender();
        }
    }

    public function previewLecture($lectureId, $videourl)
    {
        $this->lectureRecord = Lecture::findOrFail($lectureId);
        // $this->lectureRecordVideo = $this->lectureRecord->lecture_video_url;
        $this->lectureRecordVideo = $videourl;
        $this->lectureImage = $this->lectureRecord->lecture_image_url;

        $this->dispatch('openPreviewModal', ['lecvideo' => $this->lectureRecordVideo, 'lecimage' => $this->lectureImage]);
    }

    public function render()
    {
        // $this->course = Course::find($this->courseID);

        // if ($this->course) {
        //     $this->courseContent = $this->course->content;
        // }
        $this->courses = Course::where('language_id', $this->localeid)->where('status', 1)->get();
        return view('livewire.frontend.sections.course-content');
    }
}
