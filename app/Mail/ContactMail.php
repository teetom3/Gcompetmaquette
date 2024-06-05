<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $message)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouveau message de contact: ' . $this->subject)
                    ->view('emails.contact') // Référence correcte à la vue
                    ->with([
                        'subject' => $this->subject,
                        'name' => $this->name,
                        'messageContent' => $this->message,
                    ]);
    }
}

