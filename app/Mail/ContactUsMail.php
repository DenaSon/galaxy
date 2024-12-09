<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone;
    public $text;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $text)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Us Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-us', // your email view
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'text' => $this->text,
            ],
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
