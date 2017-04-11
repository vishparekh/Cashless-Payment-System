<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    //
    protected $table='sidebars';
    public function role()
    {
    	return $this->belongsTo('App\Models\Role','role_id');
    }

    
}
