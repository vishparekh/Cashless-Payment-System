<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(Request $request)
    {
        $item_id = $request->input('item_id');
        $request->session()->push('items.id', $item_id);
        //$request->session()->put('item_id', $item_id);
        $msg = 'Success';
        return response()->json(array('msg'=> $msg), 200);
    }
    public function getUser(Request $request)
    {
        $rfid = $request->input('rfid');
        $buyer = Buyer::where('rfid', '=', $rfid)->firstOrFail();
        //$user = $buyer->user;
        $users = DB::table('users')
            ->join('buyers', 'users.id', '=', 'buyers.id')
            ->select('users.*', 'buyers.balance')
            ->first();
//        $data=array(
//            'name'  =>  $buyer->user->name,
//            'bal'   =>  $buyer->bal,
//        );
        //print_r($users);
        //echo $buyer->id;
        $request->session()->put('user_id', $buyer->id);
        return response()->json(array('user'=> $users), 200);
    }
}
