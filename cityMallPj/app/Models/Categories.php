<?php

namespace App\Models;

use App\Models\fresh\GreenBrand;
use App\Models\fresh\MeatBrand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function productTypes() {
        return $this->hasMany(ProductType::class);
    }

    public function barnds() {
        return $this->hasMany(Brand::class);
    }

    public function products() {
        return $this->hasManyThrough(Product::class, ProductType::class);
    }
}
