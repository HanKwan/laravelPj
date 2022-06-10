<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request) {
        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }

        

        $post->likes()->create([
            'user_id' => $request->user()->id,
            'user_username' => $request->user()->username,
            'user_profileImage' => $request->user()->profile->profileImage ? 'storage/'. $request->user()->profile->profileImage : '/images/no-profile.jpg',
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request) {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }

    public function show(Post $post) {
        return view('post.likes', [
            'post' => $post,
        ]);
    }
}