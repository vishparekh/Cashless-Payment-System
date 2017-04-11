<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Item;
use App\Models\DiscountItem;
use App\Models\DiscountUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class MakeDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('pages.vendor.discount-list',['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor_id = Auth::user()->id;
        $items = Item::where('vendor_id',$vendor_id)->get();
        return  view('pages.vendor.discount',['items' => $items]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = $request->input('users');
        $items = $request->input('items');
        $discount = new Discount;
        $discount->user_id = Auth::user()->id;
        $discount->min_bal = $request->input('min_bal');
        $discount->max_bal = $request->input('max_bal');
        $discount->start_date = $request->input('start_date');
        $discount->end_date = $request->input('end_date');
        $discount->percentage = $request->input('percentage');;
        $discount->amount = $request->input('amount');
        $discount->min_trans = $request->input('min_trans');
        $discount->max_trans = $request->input('max_trans');
        $discount->usage = $request->input('usage');
        $discount->is_combo = 0;
        $discount->items = 1;
        $discount->users = 1;
        $discount->save();
        if($items != null)
        {
            foreach ($items as $item)
            {
                $discount_item = new DiscountItem;
                $discount_item->discount_id = $discount->id;
                $discount_item->item_id = $item;
                $discount_item->save();
            }
        }
        if(isset($users[0]))
        {
            $users = explode(",",$users[0]);
            foreach ($users as $user)
            {
                echo $user;
                $person = User::where('email', $user)->firstOrFail();
                $discount_user = new DiscountUser;
                $discount_user->discount_id = $discount->id;
                $discount_user->user_id = $person->id;
                $discount_user->save();
            }
        }
        return redirect()->route('discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::find($id);
        $vendor_id = Auth::user()->id;
        $items = Item::where('vendor_id',$vendor_id)->get();
        return view('pages.vendor.discount',['discount' => $discount, 'items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $users = $request->input('users');
        $items = $request->input('items');
        $discount->user_id = Auth::user()->id;
        $discount->min_bal = $request->input('min_bal');
        $discount->max_bal = $request->input('max_bal');
        $discount->start_date = $request->input('start_date');
        $discount->end_date = $request->input('end_date');
        $discount->percentage = $request->input('percentage');;
        $discount->amount = $request->input('amount');
        $discount->min_trans = $request->input('min_trans');
        $discount->max_trans = $request->input('max_trans');
        $discount->usage = $request->input('usage');
        $discount->is_combo = 0;
        $discount->items = 1;
        $discount->users = 1;
        $discount->save();
        /*if($items != null)
        {
            foreach ($items as $item)
            {
                $discount_item = new DiscountItem;
                $discount_item->discount_id = $discount->id;
                $discount_item->item_id = $item;
                $discount_item->save();
            }
        }
        if(isset($users[0]))
        {
            $users = explode(",",$users[0]);
            foreach ($users as $user)
            {
                echo $user;
                $person = User::where('email', $user)->firstOrFail();
                $discount_user = new DiscountUser;
                $discount_user->discount_id = $discount->id;
                $discount_user->user_id = $person->id;
                $discount_user->save();
            }
        }*/
        return redirect()->route('discounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
