<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $table = 'testimonials';

     protected $fillable = [
        'name', 'job_title', 'company', 'address', 'content', 'image', 'testimonial_order','url',
    ];
}
