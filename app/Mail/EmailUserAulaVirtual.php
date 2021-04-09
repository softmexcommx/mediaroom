<?php

namespace App\Mail;

use App\Models\UserDis;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailUserAulaVirtual extends Mailable
{
    use Queueable, SerializesModels;

    // protected $theme = 'default-app';

    public $userDis;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userDis, $password)
    {
        //
        $this->userDis = $userDis;
        $this->password = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), Config('sicenet.name'))
            ->subject('Registro SICENET')
            ->markdown('emails.aulavirtual.users.nuevo');

    }
}
