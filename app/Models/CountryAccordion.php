<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryAccordion extends Model
{
    //
    protected $table = 'country_accordion';

    protected $fillable = ['title','description','cid','created_at', 'updated_at'];
}
