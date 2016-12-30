<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollegeTab extends Model
{
    //
    protected $table = 'college_tabs';

     protected $fillable = [
        'clz_id','title','content','slug',
    ];
}
