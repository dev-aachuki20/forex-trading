<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use App\Models\Language;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    public  $search = '', $formMode = false, $updateMode = false;
    public  $statusText = 'Active';
    public $activeTab = 'english';
    public  $galleryId, $question, $answer, $type, $image, $originalImage, $status = 1;
    public $title;
    public  $languageId;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled'];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;

        $galleryEng  = Gallery::where('language_id', 1)->paginate(10);
        $galleryJp   = Gallery::where('language_id', 2)->paginate(10);
        $galleryThai = Gallery::where('language_id', 3)->paginate(10);

        return view('livewire.admin.gallery.index', compact('galleryEng', 'galleryJp', 'galleryThai'));
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
    }

    public function store()
    {
        $this->validate([
            'title'           => 'required',
            'status'          => 'required',
            'image'           => 'required',
        ]);


        $gallery = Gallery::where('deleted_at', null)->where('title', $this->title)->first();

        if (!$gallery) {
            $faq = Gallery::create([
                'title'   => $this->title,
                'status'     => $this->status,
                'created_by' => Auth::user()->id,
                'language_id' => $this->languageId,
            ]);

            // upload the image
            if ($this->image != null) {
                uploadImage($faq, $this->image, 'gallery/images/', "gallery-image", 'original', 'save', null);
            }

            $this->formMode = false;
            $this->resetInputFields();
            $this->flash('success',  getLocalization('added_success'));
        } else {
            $this->flash('error',  'Image title already exist');
        }
        return redirect()->to(url()->previous());
    }

    public function edit($id)
    {
        $record = Gallery::where('id', $id)->where('deleted_at', null)->first();
        $this->galleryId     = $id;
        $this->title         = $record->title;
        $this->status        = $record->status;
        $this->originalImage = $record->image_url;
        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'title'      => 'required',
            'status'     => 'required',
        ]);

        $valid = [
            'title'     => $validatedDate['title'],
            'status'    => $validatedDate['status'],
        ];
        $galleries = Gallery::find($this->galleryId);


        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $galleries->galleryImage->id;
            uploadImage($galleries, $this->image, 'gallery/images/', "gallery-image", 'original', 'update', $uploadId);
        }

        Gallery::where('id', $this->galleryId)->update($valid);
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
        $model = Gallery::find($delid);
        $uploadImageId = $model->galleryImage->id;
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
            'inputAttributes' => ['galleryId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $galleryId = $data['inputAttributes']['galleryId'];
        $model = Gallery::find($galleryId);
        $status = $model->status == 1 ? 0 : 1;
        Gallery::where('id', $galleryId)->update(['status' => $status]);
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->flash('success',  getLocalization('change_status'));
        return redirect()->to(url()->previous());
    }

    private function resetInputFields()
    {
        $this->title = '';
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
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
    }
}
