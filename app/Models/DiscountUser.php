<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountUser extends Model
{
    protected $table = 'discount_users';

    public function discount()
    {
        return $this->belongsTo('App\Models\Discount','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }
}
