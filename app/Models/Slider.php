<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'sliders';

    protected $fillable = ['sliderid','pageid','title','caption','link','image','iconimage','videolink','created_at', 'updated_at'];

}
