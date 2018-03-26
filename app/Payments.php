<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table='payments';

    protected $fillable = [
        'name', 'amount','userid','due','note','courses_id','userid',
    ];



}
