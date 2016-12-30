<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryBlock extends Model
{
    //
    protected $table = 'country_block';

    protected $fillable = ['cid','title','identifier','url','boption','bimg','bcolor','content','created_at','featured_image','order', 'updated_at'];
}
