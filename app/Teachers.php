<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Log;

class Teachers extends Model
{
    protected $table='teachers';

    public function userdata()
    {
        return $this->hasOne('App\User','id','userid');
    }


}
