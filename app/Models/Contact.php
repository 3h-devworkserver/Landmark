<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
     protected $table = 'contacts';

    protected $fillable = ['title','office_name','address','phone','email','created_at', 'updated_at'];

}
