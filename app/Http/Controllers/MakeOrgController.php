<?php

namespace App\Http\Controllers;

use App\Models\Org;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrg;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\WelcomeUser;
use App\Jobs\UserDelete;


class MakeOrgController extends SideController
{

    public function entry(User $user)
    {
        $user->email        =   Input::get('email');
        $user->mobile       =   Input::get('mobile');
        $user->name         =   Input::get('name');
        $user->save();
        $org                =   Org::firstOrNew(['id'=>$user->id]);
        $org->address       =   Input::get('address');
        $org->plan_id       =   Input::get('planval');
        $org->max_vendors   =   Input::get('maxvendor');
        $org->max_buyers    =   Input::get('maxbuyer');
        $org->amount        =   Input::get('amount');
        $org->ui_required   =   (Input::get('ifui')=="on")?true:false;
        $org->save();
        return $user;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //R
        if (\Gate::denies('viewallorgs')) 
        {
            abort(403);
        }
        $orgs=Org::all();
       return view('pages.org.list')->with(['orgs'=>$orgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Org::class);
        $plans=Plan::all();
        return view('pages.org.create')->with(['plans'=>$plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrg $request)
    {
        $this->authorize('create',Org::class);
        $user               =   new User();
        $user->role_id      =   2;
        $pass               =   "1234"; 
        $user->password     =   \Hash::make($pass); 
        $user=$this->entry($user);

        //Mail HERE
       Mail::to(Input::get('email'))->queue(new WelcomeUser(Input::get('name'),$pass,"Organization"));

        return redirect()->route('orgs.show', ['org' => $user->id])->with('status', 'Successfully Created');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function show(Org $org)
    {
        //
        $this->authorize('view',$org);
        return view('pages.org.show')->with(['org'=>$org]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function edit(Org $org)
    {
        //
        $this->authorize('update',$org);
        $plans=Plan::all();
        return view('pages.org.create')->with(['org'=>$org,'plans'=>$plans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrg $request, Org $org)
    {
        //
        $this->authorize('update',$org);
        $user=User::find($org->id);
        $user=$this->entry($user);
        return redirect()->route('orgs.show', ['org' => $user->id])->with('status', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function destroy(Org $org)
    {
        $this->authorize('delete',$org);
        $org->delete();
        $org->user()->delete();
        $org->vendors()->delete();
        $org->buyers()->delete();
        //dispatch(new UserDelete($org->id));
        return redirect()->route('orgs.index')->with('status', 'Successfully Deleted');
    }
}
