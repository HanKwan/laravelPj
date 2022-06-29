<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function freshes() {
        return $this->hasMany(Fresh::class);
    }

    public function freshGreenProducts() {
        return $this->hasManyThrough(FreshGreenProduct::class, FreshGreen::class);
    }

    public function freshMeatProducts() {
        return $this->hasManyThrough(FreshMeatProduct::class, FreshMeat::class);
    }
}
