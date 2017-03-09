<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course_details';

     protected $fillable = [
        'college_id','course_name','course_detail','slug','level_id','subjects','ielts','scholarship','tuitionfee'
    ];
}
