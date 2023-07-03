<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookedService extends Model
{
    protected $table = 'bookedservices';

    protected $fillable = [
        'user_id',
        'service_id',
        'price',
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
