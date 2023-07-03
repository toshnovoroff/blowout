<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'reviewText',
        'reviewDate',
        'rating',
        'reviewPhoto',
        'replyText',
        'replyDate',
    ];

    /**
     * Get the user associated with the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
