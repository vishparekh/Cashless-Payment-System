<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVendor;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\WelcomeUser;
use App\Jobs\UserDelete;

class MakeVendorController extends SideController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('checklimitvendor')->only(['create','store']);

    }

    public function entry(User $user)
    {
        $user->email        =   Input::get('email');
        $user->mobile       =   Input::get('mobile');
        $user->name         =   Input::get('name');
        $user->save();
        $vendor             =   Vendor::firstOrNew(['id'=>$user->id]);
        $vendor->org_id     =   \Auth::user()->id;
        $vendor->show       =   (Input::get('show')=="on")?true:false;
        $vendor->save();
        return $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::denies('viewallvendors')) 
        {
            abort(403);
        }
        $user=\Auth::user();
        if($user->isorg())
            $vendors=Vendor::where('org_id','=',$user->id)->get();
        else
            $vendors=Vendor::all();
        return view('pages.vendor.list')->with(['vendors'=>$vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Vendor::class);
         return view('pages.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendor $request)
    {
        $this->authorize('create',Vendor::class);
        $user               =   new User();
        $user->role_id      =   3;
        $pass               =   "1234"; 
        $user->password     =   \Hash::make($pass);  
        $user=$this->entry($user);

        //Mail HERE
        Mail::to(Input::get('email'))->queue(new WelcomeUser(Input::get('name'),$pass,$user->role->name));

        return redirect()->route('vendors.show', ['vendor' => $user->id])->with('status', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
        $this->authorize('view',$vendor);
        return view('pages.vendor.show')->with(['vendor'=>$vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
        $this->authorize('update',$vendor);
        return view('pages.vendor.create')->with(['vendor'=>$vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVendor $request, Vendor $vendor)
    {
        $this->authorize('update',$vendor);
        $user=User::find($vendor->id);
        $user=$this->entry($user);
        return redirect()->route('vendors.show', ['vendor' => $user->id])->with('status', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $this->authorize('delete',$vendor);
        $vendor->delete();
        $vendor->user()->delete();
        $vendor->items()->delete();
        //
        //dispatch(new UserDelete($vendor->id));
        return redirect()->route('vendors.index')->with('status', 'Successfully Deleted');
    }
}
