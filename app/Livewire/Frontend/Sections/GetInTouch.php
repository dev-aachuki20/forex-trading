<?php

namespace App\Livewire\Frontend\Sections;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Mail;
use App\Mail\ContactUsMail;

class GetInTouch extends Component
{
    use LivewireAlert;

    public $localeid;
    public $first_name, $last_name, $email, $phone, $title, $category, $message,$terms;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('get_in_touch', $this->localeid);
    }
    public function render()
    {
        return view('livewire.frontend.sections.get-in-touch');
    }

    public function sendContactMail()
    {
        $validatedData = $this->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email'],
            'phone'         => ['nullable','numeric'],
            'title'         => ['required'],
            'category'      => ['nullable'],
            'message'       => ['required'],
            'terms'         => ['accepted'],
        ],[
            'terms.accepted'=>'You must accept the privacy policy.',
        ]);
        try {
            //Send mail to connect
            $subject = $this->first_name;
            // $ownerEmail = 'aachukiagarwal.hipl@gmail.com';
            $ownerEmail = getSetting('support_email');
            Mail::to($ownerEmail)->queue(new ContactUsMail($subject, $this->first_name,  $this->last_name, $this->email, $this->phone, $this->title, $this->category, $this->message));

            $this->reset();
            $this->alert('success', 'Your message sent successfully!');
        } catch (\Exception $e) {
            // dd($e->getMessage().'->'.$e->getLine());
            $this->alert('error', trans('messages.error_message'));
        }
    }

    public function initializePlugins()
    {
        $this->dispatch('loadPlugins');
    }
}
