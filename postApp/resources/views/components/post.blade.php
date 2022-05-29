@props(['post' => $post])

<div>
    <div>
        <a class="font-bold text-lg mr-3" href="{{ route('profile', $post->user->username) }}">{{ $post->user->username }}</a><span class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p>{{ $post->body }}</p>
    </div>

    @can('delete', $post)
        <form action="{{ route('posts.delete', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-600">Delete</button>
        </form>
    @endcan

    <div class="flex">
        @if (!$post->likedBy(auth()->user()))
            <form class="pr-2 mb-3" action="{{ route('posts.likes', $post) }}" method="post">
                @csrf
                <button type="submit" class="text-blue-600">Like</button>
            </form>
        @else
            <form class="pr-1 mb-3" action="{{ route('posts.likes', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-600">Unlike</button>
            </form>
        @endif
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>