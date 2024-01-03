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
    public $activeLike, $activeDislike;

    protected $listeners = ['socialMediaModal', 'like', 'dislike'];

    public function mount($localeid, $courseid)
    {
        $this->localeid = $localeid;
        $this->courseid = $courseid;

        $this->pageDetail = getPageContent('learn-forex-trading-detail', $this->localeid);

        $this->allCourse = Course::where('language_id', $localeid)->where('status', 1)->get();

        if ($this->courseid) {
            $this->courseData = Course::where('language_id', $this->localeid)->where('id', $this->courseid)->first();

            if ($this->courseData && $this->courseData->lectures->isNotEmpty()) {
                $this->activeLecture = $this->courseData->lectures->first();
            }
            $this->totalViews = $this->activeLecture->total_views ?? 0;
            $this->totalLikes = $this->activeLecture->like ?? 0;
            $this->totalDislike = $this->activeLecture->dislike ?? 0;
            $this->allLecture = $this->courseData->lectures()->get();
            $this->courseCreator = User::find($this->courseData->created_by);
        }
    }

    public function likeEvent($lectureId)
    {
        $this->dispatch('like-event', ['lecture_id' => $lectureId]);
    }

    public function like($isLike)
    {
        if ($isLike) {
            $this->totalLikes += 1;
            $this->activeLike[$this->activeLecture->id] = true;
        } else {
            $this->totalLikes -= 1;
            $this->activeLike[$this->activeLecture->id] = false;
        }

        Lecture::where('id', $this->activeLecture->id)->update(['like' => $this->totalLikes]);
    }

    public function dislikeEvent($lectureId)
    {
        $this->dispatch('dislike-event', ['lecture_id' => $lectureId]);
    }

    public function dislike($isDislike)
    {
        if ($isDislike) {
            $this->totalDislike += 1;
            $this->activeDislike[$this->activeLecture->id] = true;
        } else {
            $this->totalDislike -= 1;
            $this->activeDislike[$this->activeLecture->id] = false;
        }
        Lecture::where('id', $this->activeLecture->id)->update(['dislike' => $this->totalDislike]);
    }

    public function submitSearch()
    {
        $this->searchLecture = $this->searchLecture;
    }

    public function resetFilters()
    {
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
        if ($this->activeLecture !== null) {
            $this->displayActiveId = $this->activeLecture->id ?? null;
        }

        $searchVal = $this->searchLecture;

        $courseLectureList = Lecture::query()->where('language_id', $this->localeid);

        if (!$searchVal) {
            $courseLectureList = $courseLectureList->where('course_id', $this->courseid);
        }

        $courseLectureList = $courseLectureList->where(function ($query) use ($searchVal) {
            $query->where('name', 'like', '%' . $searchVal . '%');
        })->get();

        return view('livewire.frontend.pages.learn-forex-trading-detail', compact('courseLectureList'));
    }

    public function socialMediaModal()
    {
        $this->dispatch('openSocialMediaModal');
    }
}
