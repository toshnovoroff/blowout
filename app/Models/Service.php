<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    // Relationships
    public function bookedServices()
    {
        return $this->hasMany(BookedService::class);
    }
}
