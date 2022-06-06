<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['postImage', 'caption', 'profile_id', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
