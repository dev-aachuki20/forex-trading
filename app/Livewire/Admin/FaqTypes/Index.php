<?php

namespace App\Livewire\Admin\FaqTypes;

use App\Models\FaqType;
use App\Models\Language;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;
    public $search = '';
    
    public $formMode = false, $updateMode = false, $viewMode = false;
    
    public $faqTypeId, $title, $status = 1, $allLanguages;

    public $sortColumnName = 'created_at', $sortDirection = 'asc', $paginationLength = 10;

    public $localeSession;
    protected $listeners = ['deleteConfirm', 'confirmedToggleAction', 'updatePaginationLength'];

    public function mount($locale){
        $this->localeSession = $locale;
    }

    public function render()
    {
        $statusSearch = 0;
        $searchValue = strtolower($this->search);

        $langCode = $this->localeSession;
        $faqTypes = FaqType::query()->where(function ($query) use ($langCode,$searchValue, $statusSearch) {

                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"$langCode\"')) LIKE ?", ['%'.$searchValue.'%']);
                
                $query->orWhereRaw("date_format(created_at, '" . config('constants.search_datetime_format') . "') like ?", ['%' . $searchValue . '%']);

            })->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate($this->paginationLength);

        return view('livewire.admin.faq-types.index',compact('faqTypes'));
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function updatePaginationLength($length)
    {
        $this->paginationLength = $length;
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

    public function edit($id)
    {
        $this->allLanguages = Language::where('status',1)->get();
        $record = FaqType::find($id);
        $this->faqTypeId  = $id;
        $this->title      = json_decode($record->title,true);
        $this->status     = $record->status;
        $this->formMode = true;
        $this->updateMode = true;
    }

    
    public function update()
    {
        $validateColumns = [
            'title.*' => 'required|string',
            'status'     => 'required',
        ];
        
        $validatedData = $this->validate($validateColumns, [],[
            'title.en'=>'title',
            'title.ja'=>'title',
            'title.th'=>'title'
        ]);

        $validatedData['title'] = json_encode($validatedData['title']);

        FaqType::where('id', $this->faqTypeId)->update($validatedData);

        $this->reset(['allLanguages','faqTypeId','title','status','formMode','updateMode']);

        $this->alert('success',  getLocalization('updated_success'));

    }

    public function show($id)
    {
        $this->resetPage('page');
        $this->faqTypeId    = $id;
        $this->formMode = false;
        $this->viewMode = true;
    }

    public function cancel()
    {
        $this->formMode = false;
        $this->updateMode = false;
        $this->viewMode = false;
        $this->resetErrorBag();
    }

    public function changeStatus($statusVal)
    {
        $this->status = (!$statusVal) ? 1 : 0;
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
            'inputAttributes' => ['faqTypeId' => $id, 'toggleIndex' => $toggleIndex],
        ]);
    }

    public function confirmedToggleAction($data)
    {
        $toggleIndex = $data['inputAttributes']['toggleIndex'];
        $faqTypeId = $data['inputAttributes']['faqTypeId'];
        $model = FaqType::find($faqTypeId);
        $status = !$model->status;
        $model->status = $status;
        $model->save();
        $this->alert('success',  getLocalization('change_status'));
        $this->dispatch('changeToggleStatus', ['status' => $status, 'index' => $toggleIndex]);
    }

}
