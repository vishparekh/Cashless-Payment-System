<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TranType extends Model
{
    //
    use SoftDeletes;
    protected $table='tran_types';
}
