<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartstudy_videocourses extends Model
{

protected $fillable=['name','description','provider_id'];


    public function  video_course ()
    {
        $this->hasMany('App\Smartstudy_video');

    }

}
