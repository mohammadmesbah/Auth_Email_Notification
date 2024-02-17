<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ActiveUserStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $user_id;
    public function __construct($users_id)
    {
        $this->user_id= $users_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        foreach($this->user_id as $id){
        User::where('id',$id)->update([
            'status'=>1
        ]);
    }
}
}
