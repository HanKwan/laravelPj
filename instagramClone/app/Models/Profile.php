<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['bio', 'url'];

    // public function nonImage() {
    //     return ($this->profileImage) ? '/storage/' . $this->profileImage : 'images/no-profile.jpg';
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
