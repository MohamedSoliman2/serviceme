<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['name','description','image','governorate_id','parent_id'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function servicePosts()
    {
        return $this->hasMany(ServicePost::class);
    }
}
