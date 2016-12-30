<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryMenu extends Model
{
    //
    protected $table = 'country_menu';

    protected $fillable = ['title','sub_title','country_id','slug','featured_image','header_image','content','url','created_at', 'updated_at'];
}
