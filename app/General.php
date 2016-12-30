<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    //
    protected $table = 'generals';

    protected $fillable = ['site_name','tagline','admin_email','logo','favicon','map_address','map_lat','map_lon','created_at', 'updated_at'];
}
