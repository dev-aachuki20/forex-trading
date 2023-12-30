<?php

namespace App\Livewire\Frontend\Pages;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Livewire\Component;

class LearnForexTradingDetail extends Component
{

    public $localeid;
    public $courseid;
    public $allCourse, $courseData, $activeLecture, $allLecture, $courseCreator, $courseLectureList;
    public $name, $description, $imageUrl, $videoUrl, $displayActiveId;
    public $pageDetail, $totalViews;

    public function mount($localeid, $courseid)
    {
        $this->localeid = $localeid;
        $this->courseid = $courseid;

        $this->pageDetail = getPageContent('learn-forex-trading-detail', $this->localeid);

        $this->allCourse = Course::all();

        if ($this->courseid) {
            $this->courseData = Course::where('language_id', $this->localeid)->where('id', $this->courseid)->first();
            $this->activeLecture = $this->courseData->lectures->first();
            $this->totalViews = $this->activeLecture->total_views;
            $this->allLecture = $this->courseData->lectures()->get();
            $this->courseCreator = User::find($this->courseData->created_by);
        }
    }

    public function getCourseLecture($cid)
    {
        $this->courseid = $cid;
        if ($this->courseid) {
            $this->courseLectureList = Lecture::where('course_id', $this->courseid)->get();
        }
    }

    public function changeVideo($lid)
    {
        $lecture = Lecture::find($lid);
        $this->totalViews = $lecture->total_views + 1;
        $lecture->update(['total_views' => $this->totalViews]);
        if ($lecture) {
            $this->activeLecture = $lecture;
            $this->dispatch('loadNewVideo', $this->videoUrl);
        }
    }

    public function render()
    {
        $this->getCourseLecture($this->courseid);
        $this->displayActiveId = $this->activeLecture->id;

        return view('livewire.frontend.pages.learn-forex-trading-detail');
    }
}
