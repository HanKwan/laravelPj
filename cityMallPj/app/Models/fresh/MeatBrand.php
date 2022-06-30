<?php

namespace App\Models\fresh;

use App\Models\Categories;
use App\Models\fresh\FreshMeatProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeatBrand extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Categories::class);
    }

    public function freshMeatProducts() {
        return $this->hasMany(FreshMeatProduct::class);
    }
}
