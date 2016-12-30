<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockStatic extends Model
{
    //
     protected $table = 'static_blocks';

    protected $fillable = ['page_id','identifier','position','url','static_title','sub_title','description','featured_image','parallax','boption','background_color','background_image','ordering','created_at', 'updated_at'];

}
