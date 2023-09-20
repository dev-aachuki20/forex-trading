<?php

namespace App\Livewire\Frontend\Partials;

use App\Models\Newsletter;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Footer extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    public $localeid;
    public $sortColumnName = 'created_at', $sortDirection = 'desc', $paginationLength = 10;

    public $email;
    public function render()
    {
        return view('livewire.frontend.partials.footer');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'email' => 'required|email:dns|unique:newsletters,email',
        ],[
            
            'email.unique' => 'This email address is already subscribed.',
        ]);
        $validatedData['language_id'] = $this->localeid;
        Newsletter::create($validatedData);
        $this->alert('success',  getLocalization('newsletter_success'));
        $this->reset([
            'email',
        ]);
    }
}
