<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
     protected $table = 'pages';

    protected $fillable = ['title','description','slider','featured_image','meta_title','meta_keyword','meta_description','status','slug','type','created_at', 'updated_at'];

}
