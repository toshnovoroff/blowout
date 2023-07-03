<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'educationRecords',
        'workExperience',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'masterCompitiences', 'masters_id', 'services_id');
    }
}
