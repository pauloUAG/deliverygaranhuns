<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Encontre&Compre - Confirmação de cadastro';
        return $this->to($this->user->email, $this->user->name)
                    ->subject($subject)
                    ->view('mail.SendMailUser', [
                        'user' => $this->user
                    ]);
    }
}
