<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    //
    protected $table = 'event_images';

     protected $fillable = [
        'event_id','images'
    ];
}
