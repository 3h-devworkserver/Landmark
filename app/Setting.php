<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    

    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'seos';

    protected $fillable = ['meta_title','meta_keyword','meta_desc','google_analytics','meta_robot','created_at', 'updated_at'];
 

}
