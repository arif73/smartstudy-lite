<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $table='courseicons';

    protected $fillable = [
        'id', 'url',
    ];

}
