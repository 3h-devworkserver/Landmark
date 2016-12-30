<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountrySection extends Model
{
    //
    protected $table = 'country_section';

    protected $fillable = ['title','c_id','content','url','featured_image','created_at', 'updated_at'];
}
