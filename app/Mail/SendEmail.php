<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $recipientName;
    public $emailMessage;

    /**
     * SendEmail constructor.
     * @param string $subject
     * @param string $recipientName
     * @param string $message
     */
    public function __construct(string $subject, string $recipientName, string $message)
    {
        $this->subject = $subject;
        $this->recipientName = $recipientName;
        $this->emailMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notifications.email_notification')
            ->subject($this->subject)
            ->with('emailMessage', $this->emailMessage)
            ->with('recipientName', $this->recipientName);
    }
}
