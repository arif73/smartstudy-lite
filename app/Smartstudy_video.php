<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartstudy_video extends Model
{




protected $fillable=['name','description','thumbail','url','course_id','public_rating','private_rating','duration','level_id','provider_id'];



    public function  video_level ()
    {
        $this->hasMany('App\Smartstudy_level');
    }


}
