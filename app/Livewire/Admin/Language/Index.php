<?php

namespace App\Livewire\Admin\Language;

use Livewire\Component;
use App\Models\Language;
use App\Models\Uploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert, WithFileUploads;
    public $languages;

    public  $langId, $language_code, $language_name, $image, $originalImage, $status = 1;

    public $statusText = 'Active';

    public $formMode = false, $updateMode = false;


    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled'];

    public function render()
    {
        $this->languages = Language::orderBy('id', 'desc')->get();
        return view('livewire.admin.language.index');
    }

    public function create()
    {
        $this->formMode = true;
    }
    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        // $this->viewMode = false;
    }

    public function store()
    {
        $this->validate([
            'language_code'   => 'required|unique:languages,code',
            'language_name'   => 'required|unique:languages,name',
            'image'           => 'required|mimes:svg',
            'status'          => 'required',
        ]);

        $language = Language::where('code', $this->language_code)->orWhere('name', $this->language_name)->first();
        if (!$language) {
            $language = Language::create([
                'code' => $this->language_code,
                'name' => $this->language_name,
            ]);

            // upload the image
            uploadImage($language, $this->image, 'language/image/', "language", 'original', 'save', null);
            $this->formMode = false;
            $this->resetInputFields();
            $this->flash('success',  getLocalization('added_success'));
        } else {
            $this->flash('error',  'Already Exist');
        }
        // $this->flash('success',  getLocalization('update_success'));

        return redirect()->route('auth.language');
    }

    public function edit($id)
    {
        $record = Language::where('id', $id)->first();
        $this->langId        = $id;
        $this->language_code = $record->code;
        $this->language_name = $record->name;
        $this->originalImage = $record->image_url;
        $this->status        = $record->status;

        $this->formMode = true;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'language_code'   => 'required|unique:languages,code',
            'language_name'   => 'required|unique:languages,name',
            'image'           => 'required|mimes:svg',
            'status'          => 'required',
        ]);

        $validatedDate['status'] = $this->status;
        $lang = Language::find($this->langId);

        // Check if the photo has been changed
        $uploadId = null;
        if ($this->image) {
            $uploadId = $lang->languageImage->id;
            uploadImage($lang, $this->image, 'language/image/', "language", 'original', 'update', $uploadId);
        }

        $lang->update($validatedDate);

        $this->formMode = false;
        $this->updateMode = false;

        $this->flash('success',  getLocalization('updated_success'));


        $this->resetInputFields();
        return redirect()->route('admin.language');
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
        $model = Language::find($delid);
        $uploadImageId = $model->languageImage->id;
        deleteFile($uploadImageId);
        $model->delete();
        $this->flash('success',  getLocalization('deleted_success'));
    }

    public function initializePlugins()
    {
        // $this->dispatchBrowserEvent('loadPlugins');
        $this->dispatch('loadPlugins');
        // $this->emit('loadPlugins', ['data' => 'some data']);
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
            'inputAttributes' => ['langId' => $id],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $langid = $data['inputAttributes']['langId'];
        $model = Language::find($langid);
        $status = $model->status == 1 ? 0 : 1;
        Language::where('id', $langid)->update(['status' => $status]);
        $this->statusText = $status == 1 ? 'Active' : 'Deactive';
        $this->flash('success',  getLocalization('status_change'));
    }

    private function resetInputFields()
    {
        $this->language_code = '';
        $this->language_name = '';
        $this->image = '';
        $this->status = 1;
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
    }
}
