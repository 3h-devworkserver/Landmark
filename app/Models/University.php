<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    protected $table = 'universities';

     protected $fillable = [
        'university_name','slug',
    ];
}
