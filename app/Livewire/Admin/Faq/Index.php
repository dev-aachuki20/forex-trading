<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public $activeTab = 1;

    public  $faqId = null, $question, $answer, $type, $image, $originalImage, $originalVideo, $videoExtenstion, $video, $status = 1;
    public  $languageId;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];

    public function render()
    {
        $statusSearch = 0;
        $searchValue = $this->search;
        $searchTerms = config('constants.faq_types');

        foreach ($searchTerms as  $key => $searchTerm) {
            if (Str::contains(strtolower($searchValue), strtolower($searchTerm))) {
                $statusSearch = $key;
            }
        }
        $languagedata =  Language::where('status', 1)->get();


        $getlangId =  Language::where('id', $this->activeTab)->value('id');

        $records = [];
        if ($this->activeTab == $getlangId) {
            $records = Faq::query()->where('language_id', $getlangId)->where('deleted_at', null)->where(function ($query) use ($searchValue, $statusSearch) {
                $query->where('question', 'like', '%' . $searchValue . '%')->orWhere('faq_type', $statusSearch)->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);
        }

        return view('livewire.admin.faq.index', compact('records', 'languagedata'));
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        session()->put('active_tab', $tab);
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
        $this->formMode = true;
        $this->initializePlugins();
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'question'        => 'required',
            'answer'          => 'required',
            'type'            => 'required',
            'status'          => 'required',
            'image'           => 'nullable',
            'video'           => 'nullable',
        ]);


        $faq = Faq::where('deleted_at', null)->where('question', $this->question)->where('faq_type', $this->type)->first();

        if (!$faq) {
            $faq = Faq::create([
                'question'   => $this->question,
                'answer'     => $this->answer,
                'faq_type'   => $this->type,
                'status'     => $this->status,
                'created_by' => Auth::user()->id,
                'language_id' => $this->languageId,
            ]);

            // upload the image
            if ($this->image != null) {
                uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'save', null);
            }

            //Upload video
            if ($this->video != null) {
                uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'save', null);
            }
        }
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = Faq::where('id', $id)->where('deleted_at', null)->first();
        $this->faqId         = $id;
        $this->question      = $record->question;
        $this->answer        = $record->answer;
        $this->type          = $record->faq_type;
        $this->status        = $record->status;
        $this->originalImage = $record->image_url;
        $this->originalVideo  = $record->faq_video_url;

        // $this->videoExtenstion = $record->faqVideo->extension;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'question'   => 'required',
            'answer'     => 'required',
            'type'       => 'required',
            'status'     => 'required',
        ]);


        $valid = [
            'question'  => $validatedDate['question'],
            'answer'    => $validatedDate['answer'],
            'faq_type'  => $validatedDate['type'],
            'status'    => $validatedDate['status'],
        ];

        $faq = Faq::find($this->faqId);
        # Check if the photo has been changed
        $uploadId = null;
        if (!empty($this->image)) {
            if ($faq->faqImage) {
                $uploadId = $faq->faqImage->id;
                uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'save', $uploadId);
            }
        }

        # Check if the video has been changed
        $uploadVideoId = null;
        if (!empty($this->video)) {
            if ($faq->faqVideo) {
                $uploadVideoId = $faq->faqVideo->id;
                uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'update', $uploadVideoId);
            } else {
                uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'save', $uploadVideoId);
            }
        }

        Faq::where('id', $this->faqId)->update($valid);
        $this->formMode = false;
        $this->updateMode = false;

        $this->alert('success',  getLocalization('updated_success'));
        $this->resetInputFields();
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
            'inputAttributes' => ['delid' => $id],
        ]);
    }

    public function deleteConfirm($data)
    {
        $delid = $data['inputAttributes']['delid'];
        $model = Faq::find($delid);

        if ($model->faqImage) {
            $uploadImageId = $model->faqImage->id;
            deleteFile($uploadImageId);
        }
        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
    }

    public function toggle($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to change the status.',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' => 'Yes, change it!',
            'cancelButtonText' => 'No, cancel!',
            'onConfirmed' => 'confirmedToggleAction',
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['faqId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $faqid = $data['inputAttributes']['faqId'];
        $model = Faq::find($faqid);
        $status = $model->status == 1 ? 0 : 1;
        Faq::where('id', $faqid)->update(['status' => $status]);
        // $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->alert('success',  getLocalization('change_status'));
        // $this->refresh();
        // $this->resetInputFields();
        // $this->emit('statusToggled');
        // return redirect()->to(url()->previous());
    }

    public function resetInputFields()
    {
        $this->question = '';
        $this->answer = '';
        $this->type = '';
        $this->image = '';
        $this->status = 1;
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->faqId    = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
