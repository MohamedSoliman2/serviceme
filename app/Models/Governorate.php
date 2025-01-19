<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = ['name'];
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function servicePosts()
    {
        return $this->hasMany(ServicePost::class);
    }
}
