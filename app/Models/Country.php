<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';

    protected $fillable = ['title','description','inner_description','url','featured_image','header_image','created_at', 'updated_at'];

}
