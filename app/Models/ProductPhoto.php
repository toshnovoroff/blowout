<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class ProductPhoto extends Model
{
    protected $table = 'productphotos';

    protected $fillable = [
        'product_id',
        'photo',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function getImageUrl($size)
    // {
    //     $image = Image::make($this->photo);

    //     switch ($size) {
    //         case 'small':
    //             $image->fit(300, 300);
    //             break;
    //         case 'medium':
    //             $image->fit(600, 600);
    //             break;
    //     }

    //     return $image->response();
    // }
}
