<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Org extends Model
{
    use SoftDeletes;
    //
    protected $table='orgs';
    protected $fillable = ['id'];

    public function user()
    {
    	return $this->hasOne('App\Models\User','id');
    }

    public function buyers()
    {
    	return $this->hasMany('App\Models\Buyer','org_id');
    }

    public function vendors()
    {
    	return $this->hasMany('App\Models\Vendor','org_id');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan','plan_id');
    }

    public function items()
    {
        return $this->hasManyThrough(
            'App\Models\Item', 'App\Models\Vendor',
            'org_id', 'vendor_id', 'id'
        );
    }

    public function checklimit_buyer()
    {
        $n_buyers=$this->withCount('buyers')->first();
        return $this->max_buyers-$n_buyers->buyers_count;
    }

    public function checklimit_vendor()
    {
        $n_vendors=$this->withCount('vendors')->first();
        return $this->max_buyers-$n_vendors->vendors_count;
    }
    


}
