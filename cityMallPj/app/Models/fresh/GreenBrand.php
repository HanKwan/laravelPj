<?php

namespace App\Models\fresh;

use App\Models\Categories;
use App\Models\fresh\FreshGreenProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GreenBrand extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Categories::class);
    }

    public function freshGreenProducts() {
        return $this->hasMany(FreshGreenProduct::class);
    }
}
