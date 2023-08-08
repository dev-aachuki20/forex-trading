<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public  $statusText = 'Active';
    public $activeTab = 'english';

    public  $faqId, $question, $answer, $type, $image, $originalImage, $originalVideo, $videoExtenstion, $video, $status = 1;
    public  $languageId;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled'];


    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
    }

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;

        $faqslanguageEng = Faq::query()->where('language_id', 1)->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('deleted_at', null)->where('question', 'like', '%' . $searchValue . '%')->orWhere('answer', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);

        $faqslanguageJp = Faq::query()->where('language_id', 2)->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('deleted_at', null)->where('question', 'like', '%' . $searchValue . '%')->orWhere('answer', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);


        $faqslanguageThai = Faq::query()->where('language_id', 3)->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('deleted_at', null)->where('question', 'like', '%' . $searchValue . '%')->orWhere('answer', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);
        return view('livewire.admin.faq.index', compact('faqslanguageEng', 'faqslanguageJp', 'faqslanguageThai'));
    }

    public function create()
    {
        $this->formMode = true;
        $this->languageId = Language::where('name', $this->activeTab)->value('id');
    }
    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
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


            $this->formMode = false;
            $this->resetInputFields();
            $this->flash('success',  getLocalization('added_success'));
        } else {
            $this->flash('error',  'Question already exist with their type');
        }
        return redirect()->route('auth.faq');
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


        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $faq->faqImage->id;
            uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'update', $uploadId);
        }

        // Check if the video has been changed
        $uploadVideoId = null;
        if ($this->video) {
            $uploadVideoId = $faq->faqVideo->id;
            uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'update', $uploadVideoId);
        }

        Faq::where('id', $this->faqId)->update($valid);
        $this->resetInputFields();
        $this->formMode = false;
        $this->updateMode = false;

        $this->flash('success',  getLocalization('updated_success'));
        return redirect()->to(url()->previous());
    }

    public function delete($id)
    {
        $this->confirm('Are you sure?', [
            'text' => 'You want to delete it.',
            'toast' => false,
            'position' => 'center',
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
        $uploadImageId = $model->faqImage->id;
        deleteFile($uploadImageId);
        $model->delete();
        $this->flash('success',  getLocalization('delete_success'));
        return redirect()->to(url()->previous());
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
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->flash('success',  getLocalization('change_status'));
        return redirect()->to(url()->previous());
    }

    private function resetInputFields()
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
}
