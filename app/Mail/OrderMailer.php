<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class OrderMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_USERNAME'), 'Radiant'),
            subject: 'New Order',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.order',
            with: ['order' => $this->order],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
