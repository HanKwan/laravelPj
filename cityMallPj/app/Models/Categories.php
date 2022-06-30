<?php

namespace App\Models;

use App\Models\fresh\FreshGreen;
use App\Models\fresh\FreshMeat;
use App\Models\fresh\GreenBrand;
use App\Models\fresh\MeatBrand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function freshGreens() {
        return $this->hasMany(FreshGreen::class);
    }

    public function freshMeats() {
        return $this->hasMany(FreshMeat::class);
    }

    public function greenBrands() {
        return $this->hasMany(GreenBrand::class);
    }

    public function meatBrands() {
        return $this->hasMany(MeatBrand::class);
    }

    public function freshGreenProducts() {
        return $this->hasManyThrough(FreshGreenProduct::class, FreshGreen::class);
    }

    public function freshMeatProducts() {
        return $this->hasManyThrough(FreshMeatProduct::class, FreshMeat::class);
    }
}
