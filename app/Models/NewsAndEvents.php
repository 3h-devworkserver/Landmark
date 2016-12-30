<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAndEvents extends Model
{
     protected $table = 'news_and_events';

     protected $fillable = [
        'title','c_id', 'e_date', 'summary', 'content', 'image', 'news_order','category','slug','header_img','sidebar_content'
    ];


}
