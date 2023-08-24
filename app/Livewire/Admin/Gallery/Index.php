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
    public $activeTab = 'all';
    public  $galleryId, $question, $answer, $type, $image = null, $originalImage, $status = 1;
    public $title;
    public  $languageId = null;
    public $recordImage;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled'];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        $languagedata =  Language::where('status', 1)->get();
        $getlangId =  Language::where('id', $this->activeTab)->where('status', 1)->value('id');
        $galleries = [];

        if ($getlangId) {
            $galleries = Gallery::where('language_id', $getlangId)->paginate(10);
        } else {
            $galleries = Gallery::paginate(10);
        }
        return view('livewire.admin.gallery.index', compact('galleries', 'languagedata'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->formMode = true;
        $this->languageId = Language::where('id', $this->activeTab)->value('id');
        $this->initializePlugins();
    }
    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->resetInputFields();
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
        $this->initializePlugins();
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
        if ($model->galleryImage) {
            $uploadImageId = $model->galleryImage->id;
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
            'inputAttributes' => ['galleryId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $galleryId = $data['inputAttributes']['galleryId'];
        $model = Gallery::find($galleryId);
        $status = !$model->status;
        Gallery::where('id', $galleryId)->update(['status' => $status]);
        $this->statusText = $status ? 'Active' : 'Deactive';
        $this->alert('success',  getLocalization('change_status'));

        // $this->flash('success',  getLocalization('change_status'));
        // return redirect()->to(url()->previous());
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
        $this->galleryId    = $id;
        $this->formMode = false;
    }

    public function switchTab($tab)
    {
        $this->resetPage('page');
        $this->activeTab = $tab;
        $this->search = '';
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
