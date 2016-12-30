<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryUniversity extends Model
{
    //
    //
    protected $table = 'country_university';

    protected $fillable = ['title','c_id','url','image','created_at', 'updated_at'];
}
