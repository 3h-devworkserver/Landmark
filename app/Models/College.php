<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $table = 'college_details';

     protected $fillable = [
        'uni_id','course_id','slider_id','course_detail','location','college_name','url','contact','images','college_detail','slug','header_image',
    ];
}
