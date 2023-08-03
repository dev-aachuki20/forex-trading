<?php

namespace App\Livewire\Admin\Language;

use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $languages;
    public $language_code, $language_name;
    public $langId, $langcode, $langname, $status = 1;
    public $deleteId;

    protected $listeners = ['deleteConfirm', 'confirmedToggleAction'];

    public function render()
    {
        $this->languages = Language::orderBy('id', 'desc')->get();
        return view('livewire.admin.language.index');
    }

    public function submit()
    {
        // $valid = $this->validate([
        //     'language_code'   => 'required',
        //     'language_name'   => 'required',
        // ]);

        $language = Language::where('code', $this->language_code)->orWhere('name', $this->language_name)->first();

        if (!$language) {
            Language::create([
                'code' => $this->language_code,
                'name' => $this->language_name,
            ]);
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
        if ($model->status == 1) {
            Language::where('id', $langid)->update(['status' => 0]);
        } else {
            Language::where('id', $langid)->update(['status' => 1]);
        }
        $this->alert('success', trans('messages.change_status_success_message'));
    }

    private function resetInputFields()
    {
        $this->langcode = '';
        $this->langname = '';
        $this->status = 1;
    }
}
