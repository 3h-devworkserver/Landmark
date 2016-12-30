<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    //
    protected $table = 'email_setting';

    protected $fillable = ['id','content','identify','created_at','updated_at'];
}
