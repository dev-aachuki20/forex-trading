<?php

namespace App\Livewire\Admin\CourseContent;

use App\Models\Content;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Lecture;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;
    public $languageId;
    public $viewDetails = null;
    public $contentDuration = null;
    public $course_id;
    public $courseName, $uuid;
    public $content_id = null, $name, $status = 1;

    protected $listeners = [
        'updatePaginationLength', 'confirmedToggleAction', 'deleteConfirm', 'cancelledToggleAction', 'updatecontentDuration'
    ];

    public function mount($uuid)
    {
        $this->course_id = Course::where('uuid', $uuid)->value('id');
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function sortBy($columnName)
    {
        $this->resetPage();

        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function create()
    {
        $this->resetPage('page');
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->reset([
            'uuid', 'image', 'video', 'lectureDuration', 'originalImage', 'originalVideo', 'name', 'description', 'search', 'status'
        ]);
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    public function updatecontentDuration($videoTime)
    {
        $this->contentDuration = Carbon::parse($videoTime)->format('H:i:s');
    }

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        if (Str::contains('active', strtolower($searchValue))) {
            $statusSearch = 1;
        } else if (Str::contains('inactive', strtolower($searchValue))) {
            $statusSearch = 0;
        }
        $languagedata =  Language::where('status', 1)->get();

        $allCourseContent = [];
        if ($this->activeTab) {
            $allCourseContent = Content::query()->where('language_id', $this->activeTab)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('status', $statusSearch)
                    ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.course-content.index', compact('allCourseContent', 'languagedata'));
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name'            => ['required', 'max:100', 'unique:contents,name'],
            'status'          => ['required'],
        ]);

        $this->uuid     = Str::uuid();
        $validatedData['status']      = $this->status;
        $validatedData['language_id'] = $this->languageId;
        $validatedData['duration']    = $this->contentDuration;
        $validatedData['course_id']   = $this->course_id;
        $validatedData['uuid']        = $this->uuid;

        $contents = Content::create($validatedData);

        # Start to update course duration
        $total_duration = Lecture::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');

        Content::find($contents->id)->update(['duration' => $total_duration]);

        $this->formMode = false;
        $this->reset(['uuid']);
        $this->alert('success',  getLocalization('added_success'));
    }

    public function edit($id)
    {
        $this->resetPage('page');
        $course = Content::findOrFail($id);
        $this->name            = $course->name;
        $this->content_id      = $id;
        $this->status          = $course->status;
        $this->contentDuration   = $course->duration;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedArray = [
            'name'            => ['required', 'max:100', 'unique:courses,name,' . $this->content_id],
            'status'          => ['required'],
        ];

        $validatedData = $this->validate($validatedArray);
        $validatedData['status'] = $this->status;
        $validatedData['duration'] = $this->contentDuration;

        $content = Content::find($this->content_id);
        $content->update($validatedData);

        //Start to update Content duration
        $total_duration = Lecture::select(DB::raw('SUM(duration) AS total_duration'))->where('status', 1)->value('total_duration');
        Content::find($content->id)->update(['duration' => $total_duration]);
        //End to update Content duration

        $this->formMode = false;
        $this->updateMode = false;
        $this->alert('success',  getLocalization('updated_success'));
    }

    public function delete($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to delete it.',
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'deleteConfirm',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['deleteId' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $deleteId = $data['inputAttributes']['deleteId'];
        $model = Content::find($deleteId);

        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->content_id = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function toggle($id, $toggleIndex)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onDismissed' => 'cancelledToggleAction',
            'inputAttributes' => ['contentid' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $contentid = $data['inputAttributes']['contentid'];
        $model = Content::find($contentid);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }
}
