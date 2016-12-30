<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    //
    protected $table = 'course_level';

     protected $fillable = [
        'title','slug',
    ];
}
