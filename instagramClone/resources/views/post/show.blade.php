@extends('app')

@section('content')
    <div class="flex justify-center items-center">
        <div class="bg-white mt-8 w-8/12">
            <div class="p-6">
                <div class="grid grid-cols-5">
                    <div class="col-span-3">
                        <img src="/storage/{{ $post->postImage }}" class="w-full">
                    </div>
                    <div class="col-span-2">
                        <div class="p-3">
                            <div class="mb-3">
                                <a href="/profile/{{ $post->user->username }}"><img class="border-1 rounded-full w-10 inline mr-3" src="{{ $post->user->profile->profileImage ? asset('storage/'.$post->user->profile->profileImage) : asset('/images/no-profile.jpg') }}" alt=""></a>
                                <a href="/profile/{{ $post->user->username }}"><span class="font-bold">{{ $post->user->username }}</span></a>
                            </div>
                            <hr>
                            <div class="mt-2">
                                <a href="/profile/{{ $post->user->username }}"><span class="font-bold">{{ $post->user->username }}</span></a>
                                <span>{{ $post->caption }}</span>
                                
                                <div class="flex mt-3">
                                    @if (!$post->likedBy(auth()->user()))
                                        <form action="/posts/{{ $post->id }}/likes" method="post">
                                            @csrf
                                            <button type="submit" class="text-blue-400"><span><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></span></button>
                                        </form>    
                                    @else
                                        <form action="/posts/{{ $post->id }}/unlikes" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-blue-400"><span><svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></span></button>
                                        </form>    
                                    @endif
                                    <span class="ml-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                </div>
                                
                                
                                <a href="/likes/{{ $post->id }}" class="block mt-2 text-blue-400">View Likes</a>

                                @can('delete', $post)
                                    <form class="mt-8 float-right" action="/posts/{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-400">Delete</button>
                                    </form>    
                                @endcan                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection