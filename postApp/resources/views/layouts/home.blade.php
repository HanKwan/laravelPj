@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 mt-4 w-7/12">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a class="font-bold text-lg mr-3" href="">{{ $post->user->username }}</a><span class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="text-gray-500">{{ $post->body }}</p>
                    </div>
                    <div class="mt-4 flex">
                        @if (!$post->likedBy(auth()->user()))
                            <form class="pr-2" action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                <button type="submit" class="text-sm text-blue-600">Like</button>
                            </form>
                        @else
                            <form class="pr-1" action="{{ route('posts.likes', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-blue-600">Unlike</button>
                            </form>
                        @endif
                        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                There is no post yet
            @endif
        </div>
    </div>
@endsection