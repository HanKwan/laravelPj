<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{   
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->paginate(10);

        return view('post.index', [ 'posts' => $posts ]);
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $data = request()->validate([
            'postImage' => 'required|image',
            'caption' => 'required',
        ]);

        $data['postImage'] = $request->file('postImage')->store('posts', 'public');

        $request->user()->posts()->create($data);  // dont put [] here

        return back();
    }

    public function show(Post $post) {
        return view('post.show', ['post' => $post]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/profile/'.$post->user->username);
    }
}
