<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\User;

class OrgFunController extends SideController
{
    public function authorizerfid()
    {
        $user=\Auth::user();
        if(!($user->isSuperAdmin() || $user->isOrg()))
        {
            abort(403);
        }
    }

    public function getRfid()
    {
        $this->authorizerfid();
    	return view('pages.org.getRfid');
    }

    public function postGetRfid()
    {
        $this->authorizerfid();
    	$rfid=\Input::get('rfid');
    	$buyer=Buyer::where('rfid','=',$rfid);
    	$user=\Auth::user();
        if($user->isOrg())
            $buyer=$buyer->where('org_id','=',\Auth::user()->id);
        $buyer=$buyer->first();
        if($buyer)
    	{
    		return redirect()->route('buyers.show',['buyer'=>$buyer]);
    	}
    	else
    	{
    		return \Redirect::back()->withErrors(['This RFID is not recognised']);
    	}
    }
}
