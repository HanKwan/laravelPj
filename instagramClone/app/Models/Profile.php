<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['bio', 'url'];

    // public function nonImage() {
    //     return ($this->profileImage) ? '/storage/' . $this->profileImage : 'images/no-profile.jpg';
    // }

    public function followBy(User $user) {
        return auth()->user()->following->contains('user_id', $user->id);
        // https://www.youtube.com/watch?v=WGxL8P3bihw
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
