<?php

namespace App\Livewire\Admin\Language;

use Livewire\Component;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use LivewireAlert, WithFileUploads, WithPagination;
    // public $languages;

    public  $langId, $language_code, $language_name, $image, $originalImage, $status = 1;

    public $statusText = 'Active';

    public  $search = '', $formMode = false, $updateMode = false;
    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;


    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'statusToggled', 'updatePaginationLength'];

    public function render()
    {
        $statusSearch = null;
        $searchValue = $this->search;
        $languages = Language::query()->where(function ($query) use ($searchValue, $statusSearch) {
            $query->where('deleted_at', null)->where('name', 'like', '%' . $searchValue . '%')->orWhere('code', 'like', '%' . $searchValue . '%')
                ->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);
        })->paginate(10);
        return view('livewire.admin.language.index', compact('languages'));
    }
    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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
        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'language_code'   => 'required|unique:languages,code',
            'language_name'   => 'required|unique:languages,name',
            'image'           => 'required|mimes:svg',
            'status'          => 'required',
        ]);

        $language = Language::where('deleted_at', null)->where('code', $this->language_code)->where('name', $this->language_name)->first();

        if (!$language) {
            $language = Language::create([
                'code' => $this->language_code,
                'name' => $this->language_name,
                'status' => $this->status,
            ]);

            // upload the image
            uploadImage($language, $this->image, 'language/image/', "language", 'original', 'save', null);
            $this->formMode = false;
            $this->resetInputFields();
            $this->alert('success',  getLocalization('added_success'));
        } else {
            $this->alert('error',  'Already Exist');
        }
        // $this->alert('success',  getLocalization('update_success'));

        return redirect()->route('auth.language');
    }

    public function edit($id)
    {
        $record = Language::where('id', $id)->where('deleted_at', null)->first();
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
            'language_code'   => 'required|max:' . config('constants.titlelength'),
            'language_name'   => 'required',
            'status'          => 'required',
        ]);

        $valid = [
            'code' => $validatedDate['language_code'],
            'name' => $validatedDate['language_name'],
            'status' => $validatedDate['status'],
        ];
        $lang = Language::find($this->langId);


        // Check if the photo has been changed
        $uploadId = null;

        if ($this->image) {
            $uploadId = $lang->languageImage->id;
            uploadImage($lang, $this->image, 'language/image/', "language", 'original', 'update', $uploadId);
        }
        Language::where('id', $this->langId)->update($valid);

        $this->formMode = false;
        $this->updateMode = false;

        $this->alert('success',  getLocalization('updated_success'));


        $this->resetInputFields();
        return redirect()->route('auth.language');
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
        $this->alert('success',  getLocalization('delete_success'));
        return redirect()->route('auth.language');
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }

    public function toggle($id,$toggleIndex)
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
            'inputAttributes' => ['langId' => $id,'toggleIndex'=>$toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $langid = $data['inputAttributes']['langId'];
        $model = Language::find($langid);
        $status = !$model->status;
        $model->status =  $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus',['status'=>$status,'index'=>$toggleIndex]);
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

    public function clearSearch()
    {
        $this->search = '';
    }
}
