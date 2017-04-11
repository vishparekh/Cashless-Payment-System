<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    protected $table='vendors';
    protected $fillable = ['id'];

    public function org()
    {
    	return $this->belongsTo('App\Models\Org','org_id');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User','id');
    }

    public function items()
    {
    	return $this->hasMany('App\Models\Item','vendor_id');
    }

    public function trans()
    {
    	return $this->hasMany('App\Models\Tran','user2');
    }
}
