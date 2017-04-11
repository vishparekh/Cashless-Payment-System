<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //
    protected $table='items';
    use SoftDeletes;

    public function vendor()
    {
    	return $this->belongsTo('App\Models\Vendor','vendor_id');
    }

    public function tranitems()
    {
    	return $this->hasMany('App\Models\TranItem','item_id');
    }
}
