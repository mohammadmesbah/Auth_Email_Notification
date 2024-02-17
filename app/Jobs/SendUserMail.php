<?php

namespace App\Jobs;

use App\Mail\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $emails;
    public function __construct($data)
    {
        $this->emails= $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->emails as $email){
            Mail::to($email)->send(new Email($email));
        }
    }
}
