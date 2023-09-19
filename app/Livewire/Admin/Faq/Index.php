<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public $search = '', $formMode = false, $updateMode = false, $viewMode = false;
    public $statusText = 'Active';
    public $activeTab = 1;
    public $faqId = null, $question, $answer, $type, $image, $originalImage,$removeImage = false, $originalVideo, $videoExtenstion,$removeVideo = false, $video, $status = 1;
    public  $languageId;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;
    public $isEmpty = false;
    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];

    public function render()
    {
        $statusSearch = 0;
        $searchValue = $this->search;

        $collection = collect(config('constants.faq_types'));

        $faqType = null;
        if($searchValue){
            $faqType = $collection->search(function ($item) use ($searchValue) {
                return stripos($item, strtolower($searchValue)) !== false;
            });
        }
       
        $languagedata =  Language::where('status', 1)->get();

        $records = [];
        if ($this->activeTab) {
            $records = Faq::query()->where('language_id', $this->activeTab)->where(function ($query) use ($searchValue, $statusSearch,$faqType) {
                $query->where('question', 'like', '%' . $searchValue . '%');

                if($faqType){
                    $query->orWhere('faq_type', $faqType);
                }

                $query->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);

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
        $this->initializePlugins();
        $this->reset([
            'image', 'originalImage', 'originalVideo', 'question', 'answer', 'type', 'video', 'search', 'status','removeVideo','removeImage'
        ]);
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    public function store()
    {
        $validateColumns= [
            'question'        => 'required',
            'answer'          => 'required|strip_tags',
            'type'            => 'required',
            'status'          => 'required',
            'image'           => 'nullable',
            'video'           => 'nullable',
        ];

        if($this->type){
            $validateColumns['question'] = 'required|unique:faq,question,Null,deleted_at,faq_type,'.$this->type;
        }

        $validateData =  $this->validate($validateColumns,[
            'answer.strip_tags' => 'The answer field is required.',
        ]);

        $validateData['faq_type'] = $this->type;
        $validateData['language_id'] = $this->languageId;

        $faq = Faq::create($validateData);

        // upload the image
        if ($this->image) {
            uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'save', null);
        }

        //Upload video
        if ($this->video) {
            uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'save', null);
        }
       
        $this->formMode = false;
        $this->alert('success',  getLocalization('added_success'));
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
        $this->originalVideo = $record->faq_video_url;

        // $this->videoExtenstion = $record->faqVideo->extension;
        $this->formMode = true;
        $this->updateMode = true;
        $this->initializePlugins();
    }

    public function update()
    {
        $validateColumns= [
            'question'        => 'required',
            'answer'          => 'required|strip_tags',
            'type'            => 'required',
            'status'          => 'required',
        ];

        if($this->type){
            $validateColumns['question'] = 'required|'.Rule::unique('faq')->where('faq_type',$this->type)->whereNull('deleted_at')->ignore($this->faqId, 'id');
        }

        $validatedData = $this->validate($validateColumns,[
            'answer.strip_tags' => 'The answer field is required.',
        ]);

        $faqRecord = [
            'question'  => $validatedData['question'],
            'answer'    => $validatedData['answer'],
            'faq_type'  => $validatedData['type'],
            'status'    => $validatedData['status'],
        ];

        $faq = Faq::find($this->faqId);
        # Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            if ($faq->faqImage) {
                $uploadId = $faq->faqImage->id;
                uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'update', $uploadId);
            } else {
                uploadImage($faq, $this->image, 'faq/images/', "faq-image", 'original', 'save', $uploadId);
            }
        }

        if($this->removeImage){
            if ($faq->faqImage) {
                $uploadVideoId = $faq->faqImage->id;
                deleteFile($uploadVideoId);
            }
        }

        # Check if the video has been changed
        $uploadVideoId = null;
        if ($this->video) {
            if ($faq->faqVideo) {
                $uploadVideoId = $faq->faqVideo->id;
                uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'update', $uploadVideoId);
            } else {
                uploadImage($faq, $this->video, 'faq/video/', "faq-video", 'original', 'save', $uploadVideoId);
            }
        }

        if($this->removeVideo){
            if ($faq->faqVideo) {
                $uploadVideoId = $faq->faqVideo->id;
                deleteFile($uploadVideoId);
            }
        }

        Faq::where('id', $this->faqId)->update($faqRecord);
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

        if ($model->faqVideo) {
            $uploadvideoId = $model->faqVideo->id;
            deleteFile($uploadvideoId);
        }


        $model->delete();
        $this->alert('success',  getLocalization('delete_success'));
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
            'onCancelled' => function () {
                // Do nothing or perform any desired action
            },
            'inputAttributes' => ['faqId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $faqid = $data['inputAttributes']['faqId'];
        $model = Faq::find($faqid);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex,'activeTab'=> $this->activeTab]);
    }


    // public function resetInputFields()
    // {
    //     $this->question = '';
    //     $this->answer   = '';
    //     $this->type     = '';
    //     $this->image    = null;
    //     $this->video    = '';
    //     $this->status   = 1;
    // }

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
