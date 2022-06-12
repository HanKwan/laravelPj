@extends('app')

@section('content')
    <div class="flex justify-center mt-10">
        @if ($posts->count())
            <div class="grid grid-cols-3 gap-5 w-10/12">
                @foreach ($posts as $post)
                    <div>
                        <a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/' . $post->postImage) }}" class="w-full h-full"></a>
                        <div class="mt-2">
                            <img class="border-1 rounded-full w-10 inline mr-3" src="{{ $post->user->profile->profileImage ? asset('storage/'.$post->user->profile->profileImage) : asset('/images/no-profile.jpg') }}" alt="">
                            <span class="font-bold">{{ $post->user->username }}</span>
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-center">{{ $posts->links() }}</div>
            </div>    
        @else
            <span>Follow more users for more posts!</span>
        @endif
    </div>
@endsection