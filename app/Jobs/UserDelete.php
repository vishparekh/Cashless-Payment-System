<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Buyer;
use App\Models\Item;
use App\Models\Org;

class UserDelete implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        //
        $this->user_id=$user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user=User::find($this->user_id);
        $user->delete();
        if($user->role_id==2)
        {
            $org=Org::find($user->id);
            $org->delete();
            $org->vendors()->delete();
            $org->buyers()->delete();
        }   
        else if($user->role_id==3)
        {
            $vendor=Vendor::find($user->id);
            $vendor->delete();
            $vendor->items()->delete();
        }
        else if($user->role_id==4)
        {
            $buyer=Buyer::find($user->id);
            $buyer->delete();
        }
    }
}
