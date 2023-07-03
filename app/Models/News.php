<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'newsHeading',
        'newsText',
        'newsPhoto',
    ];

    public function productCategory()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
