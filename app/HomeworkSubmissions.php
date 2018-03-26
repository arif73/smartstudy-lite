<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeworkSubmissions extends Model
{
    protected $table='homeworksubmissions';

    protected $fillable = [
        'text', 'filepath', 'status', 'comment','homeworks_id','students_id','attempts','resubmit','correction','correctionfile'
    ];

    public function student()
    {
        return $this->belongsTo('App\Students','students_id','userid');
    }

    public function user()
    {
        return $this->belongsTo('App\User','students_id','id');
    }
}
