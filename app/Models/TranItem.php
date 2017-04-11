<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TranItem extends Model
{
    use SoftDeletes;
    protected $table = 'tran_items';


    public function tran()
    {
        return $this->belongsTo('App\Models\Tran', 'tran_id');
    }

    public function items()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
}
