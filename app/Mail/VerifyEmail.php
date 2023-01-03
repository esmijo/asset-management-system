<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $user;
    public $clientName;
    public $userType;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email, $clientName, $userType)
    {
        $this->user = $user;
        $this->email = $email;
        $this->clientName = $clientName;
        $this->userType = $userType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email Verification')->view('mail.email-verification');
    }
}