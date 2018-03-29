<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartstudy_provider extends Model
{


protected $fillable=['thumbnail','name','description'];

    public function video_provider  (){
        $this->hasMany('App\Smartstudy_video');
    }

}
