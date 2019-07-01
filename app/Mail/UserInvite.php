<?php

namespace App\Mail;

use App\Company;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $user,$company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Company $company)
    {
        $this->user = $user;
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.invite',['user'=>$this->user,'company'=>$this->company]);
    }
}
