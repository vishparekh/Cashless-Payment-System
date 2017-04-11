<?php

namespace App\Http\Controllers;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Org;
use App\Models\Tran;
use App\Models\User;
use App\Models\Vendor;
use App\Models\TranItem;


class TestController extends Controller
{
    public function session(Request $request)
    {
        $value = $request->session()->get('items');
        var_dump($value);
        //var_dump($_SESSION);
    }

    public function confirm(Request $request)
    {
        $value = $request->input('items');
        $value = json_decode($value[0]);
        if($value != NULL)
        {
            $tran = new Tran;
            $total = 0;
            foreach ($value as $val)
            {
                if($val != null)
                {
                    $discounts = Discount::
                    $total += ($val->item_amount * $val->item_qty);
                }

            }
            $tran->type = 1;
            $tran->user1 = Auth::user()->id;
            $user_id = $request->session()->get('user_id');
            $buyer = Buyer::find($user_id);
            $buyer->balance = $buyer->balance - $total;
            $vendor = Vendor::find(Auth::user()->id);
            $vendor->balance = $vendor->balance + $total;
            $tran->user2 = $user_id;
            $tran->amount = $total;
            $tran->status = 1;
            $tran->save();
            $buyer->save();

            foreach ($value as $val)
            {
                if($val != null)
                {
                    $tranItem = new TranItem;
                    $tranItem->tran_id = $tran->id;
                    $tranItem->item_id = $val->item_id;
                    $tranItem->quantity = $val->item_qty;
                    $tranItem->amount = $val->item_amount;
                    $tranItem->save();
                }
            }
            $request->session()->pull('user_id');
        }
        else
        {
            echo "Empty";
        }
        return redirect('home')->with('status', 'Successful Transaction');
    }

    public function getHistory()
    {
        $user_id = Auth::user()->id;
        $trans = Tran::where('user2','=',$user_id)->get();
        return view('pages.vendor.history',['trans' => $trans]);
    }

    public function getAdminHistory()
    {
        $vendors = Vendor::where('org_id',8)->get();
        $trans = Tran::whereIn('user2', $vendors->toArray())->get();
        return view('vendors.history',['trans' => $trans]);
    }
    
    public function test()
    {

        $user=\Auth::user();
        var_dump($user->sidebars());
        $this->authorize('create', Vendor::class);
        if ($user->can('create', Vendor::class)) {
            echo "gtgtgtg";
        }
        else
        {
            echo "Noooo";
        }
        
        var_dump($user->isOrg());
        return;
        $user=User::find(3);
        $org=Org::find(3);
        //$vendors1=Vendor::where('org_id','=',3);
        //var_dump($vendors1);
        echo "<br /><br /><br /><br />";
        $vendors=$org->vendors()->delete();
        //var_dump($vendors);
        //$vendors->delete();
        $org->delete();
        $user->delete();
        return;



        $array=array(
            'name' => 'Nilesh',
            'amount'    =>  'er',
            );
        $validator = \Validator::make($array, [
            "name" => 'required|min:12',
            "amount"    =>  'required|numeric'
        ]);
        if($validator->fails())
        {
            echo "Fail<br />";
            foreach($validator->errors()->all() as $er)
            {
                echo $er;
                echo "<br />";
            }
            //var_dump($validator->errors());
        }
        else
        {
            echo "Not fail";
        }
    }
}
