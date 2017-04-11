<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tran extends Model
{
    use SoftDeletes;
    protected $table='trans';


    public function buyer()
    {
    	return $this->belongsTo('App\Models\Buyer','user1');
    }

    public function vendor()
    {
    	return $this->belongsTo('App\Models\Vendor','user2');
    }

    public function tranitems()
    {
    	return $this->hasMany('App\Models\TranItem','tran_id');
    }

    public function type()
    {
    	return $this->belongsTo('App\Models\TranType','type');
    }
}
