<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function discountitems()
    {
        return $this->hasMany('App\Models\DiscountItem','discount_id');
    }

    public function discountusers()
    {
        return $this->hasMany('App\Models\DiscountUser','discount_id');
    }
}
