<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='rooms';

    protected $fillable = [
        'roomnumber', 'capacity', 'description', 'buildings_id'
    ];

    public function building()
    {
        return $this->belongsTo('App\Building');
    }
}
