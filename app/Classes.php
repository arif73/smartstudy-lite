<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table='classes';

    protected $fillable = [
        'name', 'shortname',
    ];

    public function students()
    {
        return $this->hasMany('App\Students');
    }

    public function sections()
    {
        return $this->hasMany('App\Sections');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Courses','courseclasses');
    }
}
