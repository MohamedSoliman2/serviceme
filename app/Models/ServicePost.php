<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePost extends Model
{
    protected $fillable=['title','description','image','service_id'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
