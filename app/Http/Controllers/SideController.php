<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sidebar;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SideController extends Controller
{
	protected $user;
	public function __construct()
	{

	    $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $sidebars=Sidebar::where('role_id','=',$this->user->role_id)->get();
            $name=$this->user->name;
            $role=$this->user->role->name;
            //var_dump($sidebars);
            //die();
            \View::share('sidebars', $sidebars);
            \View::share('name', $name);
            \View::share('role', $role);
            return $next($request);
        });
	  }
}
