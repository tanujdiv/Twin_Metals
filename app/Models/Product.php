<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $table = 'products';
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'image',
    ];
}
