<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
     protected $table = 'post_category';

    protected $fillable = ['category','category_slug','created_at', 'updated_at'];
}
