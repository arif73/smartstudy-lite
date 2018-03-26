<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $table='sections';

    protected $fillable = [
        'name', 'shortname','classes_id',
    ];

    public function students()
    {
        return $this->hasMany('App\Students','sections_id','id');
    }

    public function section()
    {
        return $this->belongsTo('App\Classes','classes_id','id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Classes');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Courses','courseclasses');
    }

}
