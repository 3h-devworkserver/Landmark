<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //
     protected $table = 'socials';

    protected $fillable = ['facebook','twitter','google_plus','youtube','tumblr','pinterest','linkedin','vimeo','created_at', 'updated_at'];
}
