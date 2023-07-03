<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookedProduct extends Model
{
    protected $table = 'bookedproducts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
