<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Subscriber $subscriber)
    {
        $this->onQueue('mail');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->withSwiftMessage(function ($message) {
                $message->getHeaders()->addTextHeader(
                    'List-Unsubscribe', route('unsubscribe', ['email' => $this->subscriber->email, 'secret' => $this->subscriber->secret])
                );
            })
            ->view('email');
    }
}
