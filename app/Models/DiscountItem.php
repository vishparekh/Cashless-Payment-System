<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountItem extends Model
{
    protected $table = 'discount_items';
    //protected $fillable = ['item_id'];

    public function discount()
    {
        return $this->belongsTo('App\Models\Discount','id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\User','id');
    }

}
