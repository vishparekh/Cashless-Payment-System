<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends SideController
{
    public function profile()
    {
    	return view('pages.profile.user')->with(['user'=>\Auth::user()]);
    }

    public function postprofile()
    {
    	$user=\Auth::user()->id;
    	$validator = \Validator::make($buyer,[
                'email'     =>  'required|unique:users,email,'.$user->id.'|email',
                'name'      =>  'required',
                'mobile'    =>  'required|numeric|digits:10',
                ])->validate();
    	$user->name=\Input::get('name');
    	$user->email=\Input::get('email');
    	$user->mobile=\Input::get('mobile');
    	$user->save();
    	return redirect()->route('profile')->with('status', 'Successfully Created');

    }

}
