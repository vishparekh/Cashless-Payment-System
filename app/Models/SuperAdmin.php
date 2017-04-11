<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuperAdmin extends Model
{
    //
    protected $table = 'super_admins';
    use SoftDeletes;

    public function user()
    {
    	return $this->hasOne('App\Models\User','id');
    }

}
