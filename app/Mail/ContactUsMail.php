<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $first_name, $last_name, $email, $phone, $title, $category, $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $first_name, $last_name, $email, $phone, $title, $category, $message)
    {
        $this->subject          = $subject;
        $this->first_name       = ucwords($first_name);
        $this->last_name        = ucwords($last_name);
        $this->email            = $email;
        $this->phone            = $phone;
        $this->title            = $title;
        $this->category         = $category;
        $this->message          = $message;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-us', [
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'title'         => $this->title,
            'category'      => $this->category,
            'message'       => $this->message,
        ])->subject($this->subject);
    }
}
