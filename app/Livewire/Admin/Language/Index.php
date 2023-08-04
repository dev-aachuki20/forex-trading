<?php

namespace App\Livewire\Admin\Language;

use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert, WithFileUploads;
    public $languages;

    public $language_code, $language_name, $image;
    public $langId, $langcode, $langname, $status = 1;
    public $deleteId;
    public $statusText = 'Active';

    public $formMode = false, $updateMode = false;


    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'create'];

    public function mount()
    {
        $this->formMode;
        $this->language_code;
        $this->language_name;
        $this->image;
    }
    public function render()
    {
        $this->languages = Language::orderBy('id', 'desc')->get();
        return view('livewire.admin.language.index');
    }

    public function create()
    {

        // $this->resetPage('page');
        // $this->resetInputFields();
        $this->formMode = true;

        // $this->initializePlugins();
    }

    public function submit()
    {
        // $valid = $this->validate([
        //     'language_code'   => 'required',
        //     'language_name'   => 'required',
        //     'image'           => 'required|image,
        // ]);

        $language = Language::where('code', $this->language_code)->orWhere('name', $this->language_name)->first();

        if (!$language) {
            $language = Language::create([
                'code' => $this->language_code,
                'name' => $this->language_name,
            ]);

            // upload the image
            uploadImage($language, $this->image, 'language/image/', "language", 'original', 'save', null);

            $this->flash('success',  'Inserted');
        } else {
            $this->flash('error',  'Already Exist');
        }
        // $this->flash('success',  getLocalization('update_success'));

        return redirect()->route('auth.language');
    }

    public function edit($id)
    {
        $this->initializePlugins();
        $record = Language::where('id', $id)->first();
        // dd($record);
        $this->langId = $record->id;
        $this->langcode = $record->code;
        $this->langname = $record->name;
        $this->status  = $record->status;
    }

    public function update()
    {
        dd('dfski');
        $validatedDate = $this->validate([
            'langcode'   => 'required',
            'langname'   => 'required',
            'status'     => 'required',
        ]);

        $validatedDate['status'] = $this->status;
        $lang = Language::find($this->langId);
        $lang->update($validatedDate);
        $this->flash('success', trans('messages.edit_success_message'));
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
        $model->delete();
        $this->alert('success', trans('messages.delete_success_message'));
    }

    public function initializePlugins()
    {
        // $this->dispatchBrowserEvent('loadPlugins');
        $this->dispatch('loadPlugins');
        // $this->emit('loadPlugins', ['data' => 'some data']);
    }

    // public function initializes()
    // {
    //     $this->dispatchBrowserEvent('DOMContentLoaded');
    // }

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

        // $this->emit('statusToggled', $status);
        $this->alert('success', trans('messages.change_status_success_message'));
    }

    // public function statusToggled($status)
    // {
    //     // Update the switch state based on the emitted status
    //     $this->lang->status = $status;
    // }

    private function resetInputFields()
    {
        $this->langcode = '';
        $this->langname = '';
        $this->status = 1;
    }
}
