<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subheading',
        'productCategories_id',
        'description',
        'application',
        'composition',
        'applicationArea',
        'purpose',
        'targetAudience',
        'price'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'productCategories_id');
    }

    public function productPhotos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }
}
