<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticBlock extends Model
{
    //
    protected $table = 'static_pages';

    protected $fillable = ['page_id','position','url','static_title','sub_title','short_description','description','featured_image','parallax','boption','background_color','background_image','ordering','created_at', 'updated_at'];

}
