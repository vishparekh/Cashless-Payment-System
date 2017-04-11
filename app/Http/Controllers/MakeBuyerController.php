<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\User;
use App\Models\Org;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBuyer;
use App\Http\Requests\StoreExcelSheet;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\WelcomeUser;
use App\Jobs\CreateBuyersWithFile;
use App\Jobs\UserDelete;

class MakeBuyerController extends SideController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('checklimitbuyer')->only(['create','store','createWithFile','postCreateWithfile']);

    }

    public function entry(User $user)
    {
        $user->email        =   Input::get('email');
        $user->mobile       =   Input::get('mobile');
        $user->name         =   Input::get('name');
        $user->save();
        $buyer             =    Buyer::firstOrNew(['id'=>$user->id]);
        $buyer->org_id     =    \Auth::user()->id;
        $buyer->rfid       =    Input::get('rfid');
        $buyer->save();
        return $user;
    }

    public function check_limit()
    {
        $user=\Auth::user();
        $n_buyers=$user->org->withCount('vendors')->first();
        if($user->org->max_buyers>$n_buyers->vendors_count)
            return false;
        return true;
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
            $buyers=Buyer::where('org_id','=',$user->id)->get();
        else
            $buyers=Buyer::all();
        return view('pages.buyer.list')->with(['buyers'=>$buyers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Buyer::class);
        /*$org=Org::find(\Auth::user()->id);
        if(!$org->checklimit_buyer())
            return view('errors.maxlimit');*/
        
        return view('pages.buyer.create');
    }


    public function createWithFile()
    {
        $this->authorize('create',Buyer::class);
        $org=Org::find(\Auth::user()->id);
        if(!$org->checklimit_buyer())
            return view('errors.maxlimit');
        return view('pages.buyer.createwithfile');
    }

    public function postCreateWithfile(Request $request)
    {
        $this->authorize('create',Buyer::class);
        $org=Org::find(\Auth::user()->id);
        if(!$org->checklimit_buyer())
            return view('errors.maxlimit');
        \Validator::make($request->all(), [
            'blist' => 'required|file|mimes:xlsx',
            ])->validate();

        $file = \Input::file('blist');
        $dest = storage_path('buyerslist');
        $t=time();
        $filename = $t.'.'.$file->getClientOriginalExtension();
        $file->move($dest, $filename);
        dispatch(new CreateBuyersWithFile($t,\Auth::user()->id));
        return view('pages.buyer.createwithfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuyer $request)
    {
        $this->authorize('create',Buyer::class);
        $org=Org::find(\Auth::user()->id);
        if(!$org->checklimit_buyer())
            return view('errors.maxlimit');
        $user               =   new User();
        $user->role_id      =   4;
        if(\Auth::user()->org->ui_required)
        {
            $pass               =   "1234"; 
            $user->password     =   \Hash::make($pass);
            Mail::to(Input::get('email'))->queue(new WelcomeUser(Input::get('name'),$pass,$user->role->name));
        }      
        $user=$this->entry($user);

        //Mail HERE

        
        return redirect()->route('buyers.show', ['buyer' => $user->id])->with('status', 'Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        $this->authorize('view',$buyer);
        return view('pages.buyer.show')->with(['buyer'=>$buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        $this->authorize('update',$buyer);
        return view('pages.buyer.create')->with(['buyer'=>$buyer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBuyer $request, Buyer $buyer)
    {
        $this->authorize('update',$buyer);
        $user=User::find($buyer->id);
        $user=$this->entry($user);
        return redirect()->route('buyers.show', ['buyer' => $user->id])->with('status', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $this->authorize('delete',$buyer);
        $buyer->delete();
        $buyer->user()->delete();
        //
        //dispatch(new UserDelete($buyer->id));
        return redirect()->route('buyers.index')->with('status', 'Successfully Deleted');
    }
}
