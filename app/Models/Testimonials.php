<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $fillable=['name','description','image','rating'];
}
