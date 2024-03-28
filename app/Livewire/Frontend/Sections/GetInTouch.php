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
    public $first_name, $last_name, $email, $phone_number, $title, $category, $message,$terms;
    public $sectionDetail;
    public function mount()
    {
        $this->sectionDetail = getSectionContent('get_in_touch', $this->localeid);
        if(is_null($this->sectionDetail)){
            $this->skipRender(); 
        }
    }
    public function render()
    {
        return view('livewire.frontend.sections.get-in-touch');
    }

    public function sendContactMail()
    {
        $messages = [

            'first_name.required'   => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.first_name'))]),
            'first_name.string'     => __('validation.string', ['attribute' => strtolower(__('cruds.user.fields.first_name'))]),
            'last_name.required'    => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.last_name'))]),
            'last_name.string'      => __('validation.string', ['attribute' => strtolower(__('cruds.user.fields.last_name'))]),
            'phone_number.numeric'  => __('validation.numeric', ['attribute' => strtolower(__('cruds.user.fields.phone'))]),
            'phone_number.digits'   => __('validation.digits', ['attribute' => strtolower(__('cruds.user.fields.phone')), 'digits' => 10]),
            'email.required'        => __('validation.required', ['attribute' => strtolower(__('cruds.user.fields.email'))]),
            'email.email'           => __('validation.email', ['attribute' => strtolower(__('cruds.user.fields.email'))]),
            'message.required'      => __('validation.required', ['attribute' => strtolower(__('cruds.user.profile.message'))]),
            'terms.accepted'        => __('validation.accepted', ['attribute' => __('cruds.user.profile.terms')]),
        ];

        $validatedData = $this->validate([
            'first_name'    => ['required','string','regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'last_name'     => ['required','string','regex:/^[a-zA-Z ]+[A-Za-z ]+$/'],
            'email'         => ['required', 'email:dns'],
            'phone_number'  => ['nullable','numeric','digits:10'],
            'title'         => ['nullable','string'],
            'category'      => ['nullable'],
            'message'       => ['required','string'],
            'terms'         => ['accepted'],
        ], $messages
    );
        try {
            //Send mail to connect
            $subject = $this->first_name;
            // $ownerEmail = 'aachukiagarwal.hipl@gmail.com';
            $ownerEmail = getSetting('support_email');
            Mail::to($ownerEmail)->queue(new ContactUsMail($subject, $this->first_name,  $this->last_name, $this->email, $this->phone_number, $this->title, $this->category, $this->message));

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
