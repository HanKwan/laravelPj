<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fresh extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Categories::class);
    }
}
