<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends Model
{
    //
    use SoftDeletes;
    protected $table='buyers';
    protected $fillable = ['id'];

    public static $newBuyerRules=array(
        'email'     =>  'required|unique:users,email,|email',
        'name'      =>  'required',
        'mobile'    =>  'required|numeric|digits:10',
        'rfid'      =>  'numeric',
        );

    public function org()
    {
    	return $this->belongsTo('App\Models\Org','org_id');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User','id');
    }

    public function trans()
    {
    	return $this->hasMany('App\Models\Tran','user1');
    }
}
