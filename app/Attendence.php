<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $table='attendence';


    protected $fillable = [
        'date', 'machinetime', 'userid', 'role', 'mode', 'staffuserid', 'approved','delay','type','machineid','present',
    ];
}
