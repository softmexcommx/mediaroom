<?php

namespace App\Jobs;

use App\Mail\EmailUserAulaVirtual;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailUserAulaVirtual implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userDis;
    public $password;
    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {

            Mail::to($this->userDis->email)->send(new EmailUserAulaVirtual($this->userDis, $this->password));
        } catch (\Swift_TransportException $e) {

            if ($e->getMessage()) {
                Log::error('Error envio email usuario en linea: ' . $e->getMessage());
            }
        }
    }
}
