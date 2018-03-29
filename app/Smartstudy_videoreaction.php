<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartstudy_videoreaction extends Model
{


    protected $fillable=['video_id','user_id','time','ip','reaction_type_id'];


    public function reaction_type(){
        $this->hasMany('App\Smartstudy_reactiontype','reaction_type_id');
    }

    public function  video (){
        $this->hasMany('App\Smartstudy_video');




    }

}
