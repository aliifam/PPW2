<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $email_pengirim =  $this->data['email_pengirim'];
        $nama_pengirim = $this->data['name'];

        return new Envelope(
            from: new Address($email_pengirim, $nama_pengirim),
            replyTo: [
                new Address($email_pengirim, $nama_pengirim),
            ],
            subject: $this->data['subject'] . ' - ' . $this->data['name'],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.dynamic_email_template',
            with: [
                'name' => $this->data['name'],
                'email_pengirim' => $this->data['email_pengirim'],
                'body' => $this->data['body'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
