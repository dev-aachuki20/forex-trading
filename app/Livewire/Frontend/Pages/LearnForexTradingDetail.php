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
    public $allCourse, $courseData, $activeLecture, $allLecture, $courseCreator;
    public $name, $description, $imageUrl, $videoUrl, $displayActiveId;
    public $pageDetail, $totalViews, $searchLecture, $totalLikes, $totalDislike;

    protected $listeners = ['socialMediaModal','like','dislike'];

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
            $this->totalLikes = $this->activeLecture->like;
            $this->totalDislike = $this->activeLecture->dislike;
            $this->allLecture = $this->courseData->lectures()->get();
            $this->courseCreator = User::find($this->courseData->created_by);
        }
    }

    public function likeEvent($lectureId){
        $this->dispatch('like-event', ['lecture_id'=>$lectureId,'totalLikes'=>$this->totalLikes,'totalDislikes'=>$this->totalDislike]);
    }

    public function like($value){
        $updated = Lecture::where('id',$this->activeLecture->id)->update(['like' => $value]);
        if($updated){
            $this->totalLikes = $value;
        }
    }

    public function dislikeEvent($lectureId){
        $this->dispatch('dislike-event', ['lecture_id'=>$lectureId,'totalLikes'=>$this->totalLikes,'totalDislikes'=>$this->totalDislike]);
    }

    public function dislike($value){
        $recordUpdate['dislike'] = $value;
        $updated = Lecture::where('id',$this->activeLecture->id)->update($recordUpdate);
        if($updated){
            $this->totalDislike = $value;
        }
    }

    public function submitSearch(){
        $this->searchLecture = $this->searchLecture;
    }

    public function resetFilters(){
        $this->reset(['searchLecture']);
    }

    public function getCourseLecture($cid)
    {
        $this->courseid = $cid;
    }

    public function changeVideo($lid)
    {
        $lecture = Lecture::find($lid);
        $this->totalViews = $lecture->total_views + 1;
        $lecture->update(['total_views' => $this->totalViews]);
        if ($lecture) {
            $this->activeLecture = $lecture;
            $this->totalLikes = $lecture->like;
            $this->totalDislike = $lecture->dislike;
            $this->dispatch('loadNewVideo', $this->videoUrl);
        }
    }

    public function render()
    {
        $this->displayActiveId = $this->activeLecture->id;

        $searchVal = $this->searchLecture;

        $courseLectureList = Lecture::query()->where('language_id', $this->localeid);

        if(!$searchVal){
            $courseLectureList= $courseLectureList->where('course_id', $this->courseid);
        }

        $courseLectureList = $courseLectureList->where(function($query) use($searchVal){
            $query->where('name','like','%'.$searchVal.'%');
        })->get();

        return view('livewire.frontend.pages.learn-forex-trading-detail',compact('courseLectureList'));
    }

    public function socialMediaModal(){
        $this->dispatch('openSocialMediaModal');
    }
}
