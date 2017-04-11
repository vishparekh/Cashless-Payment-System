<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Org;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreItem;

class MakeItemController extends SideController
{


    public function entry(Item $item)
    {
        $item->name         =   Input::get('name');
        $item->amount       =   Input::get('amount');
        $item->vendor_id    =   \Auth::user()->id;
        $item->show       =   (Input::get('show')=="on")?true:false;
        $item->save();
        return $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (\Gate::denies('viewallitems')) 
        {
            abort(403);
        }
        $user=\Auth::user();
        if($user->isSuperAdmin())
            $items=Item::all();
        else if($user->isOrg())
        {
            $org=Org::find($user->id);
            $items=$org->items;
        }
        else if($user->isVendor())
        {
            $vendor=Vendor::find($user->id);
            $items=$vendor->items;
        }
        return view('pages.item.list')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Item::class);
        return view('pages.item.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $this->authorize('create',Item::class);
        $item  =   new Item(); 
        $item=$this->entry($item);

        //Mail HERE

        return redirect()->route('items.show', ['item' => $item->id])->with('status', 'Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $this->authorize('view',$item);
        return view('pages.item.show')->with(['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $this->authorize('update',$item);
        return view('pages.item.create')->with(['item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItem $request, Item $item)
    {
        $this->authorize('update',$item);
        $item=$this->entry($item);
        return redirect()->route('items.show', ['item' => $item->id])->with('status', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $this->authorize('delete',$item);
        $item->delete();
        return redirect()->route('items.index')->with('status', 'Successfully Deleted');
    }

    public function home()
    {
        if (\Gate::denies('viewallitems')) 
        {
            abort(403);
        }
        $user=\Auth::user();
        if($user->isSuperAdmin())
            $items=Item::all();
        else if($user->isOrg())
        {
            $org=Org::find($user->id);
            $items=$org->items;
        }
        else if($user->isVendor())
        {
            $vendor=Vendor::find($user->id);
            $items=$vendor->items;
        }
        return view('vendors.home')->with(['items'=>$items]);
    }
}
