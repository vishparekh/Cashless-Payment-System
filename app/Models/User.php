<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $dates = ['deleted_at'];

    public function isSuperAdmin()
    {
        return $this->role_id==1;
    }

    public function isOrg()
    {
        return $this->role_id==2;
    }

    public function isVendor()
    {
        return $this->role_id==3;
    }

    public function isBuyer()
    {
        return $this->role_id==4;
    }


    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }

    public function superadmin()
    {
        return $this->hasOne('App\Models\SuperAdmin','id');
    }

    public function org()
    {
        return $this->hasOne('App\Models\Org','id');
    }

    public function vendor()
    {
        return $this->hasOne('App\Models\Vendor','id');
    }


    public function buyer()
    {
        return $this->hasOne('App\Models\Buyer','id');
    }

    public function sidebars()
    {
        return $this->belongsToMany('App\Models\Sidebar', 'roles', 'role_id', 'role_id');
    }
}
