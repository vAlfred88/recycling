<?php

namespace App\Mail;

use App\Company;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $user,$company;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
        return $this->view('mails.register.user')
            ->with([
                'user' => $this->user,
            ])
            ->attach(public_path().'\images\logo.svg',[
                'as' => 'name.svg',
            ]);
    }
}
