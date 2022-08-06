<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'price', 'image', 'description', 'promotional_price', 'category_id', 'in_promotion', 'active'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}