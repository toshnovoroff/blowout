<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'productCategories';

    public function products()
    {
        return $this->hasMany(Product::class, 'productCategories_id');
    }
}
