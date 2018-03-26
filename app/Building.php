<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table='buildings';

    protected $fillable = [
        'name', 'shortname', 'address', 'description',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room','buildings_id','id');
    }
}
