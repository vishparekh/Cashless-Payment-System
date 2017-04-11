<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //
    use SoftDeletes;
    
    protected $table='roles';
    

    public function users()
    {
    	return $this->hasMany('App\Models\User','role_id');

    }
}
