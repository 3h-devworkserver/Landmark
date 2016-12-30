<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTab extends Model
{
    //
    protected $table = 'course_tabs';

     protected $fillable = [
        'college_id','course_id','title','content','slug',
    ];
}
