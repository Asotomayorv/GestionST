<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetLink;
    public $userName;
    public $userLastName1;

    public function __construct($resetLink, $userName, $userLastName1)
    {
        $this->resetLink = $resetLink;
        $this->userName = $userName;
        $this->userLastName1 = $userLastName1;
    }

    public function build()
    {
        return $this->view('email.user.resetPassword')
                    ->with([
                        'resetLink' => $this->resetLink,
                        'userName' => $this->userName,
                        'userLastName1' => $this->userLastName1,
                    ]);
    }

    //Get the message envelope.
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reestablecimiento de Contraseña',
        );
    }

    //Get the message content definition.
    public function content(): Content
    {
        return new Content(
            markdown: 'email.user.resetPassword',
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
