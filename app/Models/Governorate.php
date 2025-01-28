<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = ['name', 'latitude', 'longitude'];
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function servicePosts()
    {
        return $this->hasMany(ServicePost::class);
    }
}
