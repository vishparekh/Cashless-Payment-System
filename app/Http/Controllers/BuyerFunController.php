<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerFunController extends SideController
{
    //
    public function block($buyer=0)
    {
    	$user=\Auth::user();
    	if($buyer==0)
    	{
    		if($user->isBuyer())
    			return view('pages.buyer.block');
    		else
    			abort(404);
    	}
    	$buyer=Buyer::find($buyer);
    	if($user->isSuperAdmin() || ($user->isOrg() && $buyer->org_id==$user->id) || ($user->isBuyer() && $buyer->id==$user->id))
    	{
    		$buyer->blocked=!$buyer->blocked;
    		$buyer->save();
    		return back();
    	}
    	else
    	{
    		abort(403);
    	}

    }
}
