<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Org;
use App\Mail\SendCreateBuyerFail;

class CreateBuyersWithFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $filename,$org_id;

    public function __construct($filename,$org_id)
    {
        //
        $this->filename     =   $filename;
        $this->org_id       =   $org_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $org=Org::find($this->org_id);
        $buyers = \Excel::load(storage_path('buyerslist/'.$this->filename.'.xlsx'))->all()->toArray();
        $line=2;
        $left=$org->checklimit_buyer();
        $total=count($buyers);
        $c='';
        foreach($buyers as $buyer)
        {
            $validator = \Validator::make($buyer,[
                'email'     =>  'required|unique:users,email|email',
                'name'      =>  'required',
                'mobile'    =>  'required|numeric|digits:10',
                'rfid'      =>  'numeric',
                ]);
            if($validator->fails())
            {  
                $c.="<br /><br />We have error on Number of row-->".$line." Which is following: <br /><br />"; 
                $k=1;
                foreach($validator->errors()->all() as $er)
                {
                    $c.=$k." ";
                    $c.=$er;
                    $c.="<br />";
                    $k++;
                }
                //var_dump($validator->errors());
            }
            else
            {
                $user=new User();
                $user->email        =   $buyer['email'];
                $user->mobile       =   $buyer['mobile'];
                $user->name         =   $buyer['name'];
                $user->role_id      =   4;
                if($org->ui_required)
                {
                    $pass               =   "1234"; 
                    $user->password     =   \Hash::make($pass);
                    \Mail::to($user->email)->queue(new WelcomeUser($user->name ,$pass,$user->role->name));
                }
                
                $user->save();
                $buyer1             =    Buyer::firstOrNew(['id'=>$user->id]);
                $buyer1->org_id     =    $this->org_id;
                $buyer1->rfid       =    $buyer['rfid'];
                $buyer1->save();
                //Mail::to($user->email)->queue(new WelcomeUser($user->name,$pass,$user->role->name));
            }
            $line++;
            if($line-2>=$left && $total!=$left)
            {
                $c.="<br /><br />You have reached Your LIMITS, We can not add more";
                break;
            }
        }
        if($c!='')
            $c="Congratulations!! Successfully uploaded your File";
        \Mail::to($org->user->email)->queue(new SendCreateBuyerFail($org->name,$c));
                
    }
}
