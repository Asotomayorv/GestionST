<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $systemUser;
    public $password;
    public $userName;
    public $userLastName1;

    public function __construct($systemUser, $password, $userName, $userLastName1)
    {
        $this->systemUser = $systemUser;
        $this->password = $password;
        $this->userName = $userName;
        $this->userLastName1 = $userLastName1;
    }

    public function build()
    {
        return $this->view('emails.user.created');
    }

    //Get the message envelope.
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Usuario Registrado',
        );
    }

    //Get the message content definition
    public function content(): Content
    {
        return new Content(
            markdown: 'email.user.created',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
