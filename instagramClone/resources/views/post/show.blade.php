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
                                <img class="border-1 rounded-full w-10 inline mr-3" src="{{ $post->user->profile->profileImage ? asset('storage/'.$post->user->profile->profileImage) : asset('/images/no-profile.jpg') }}" alt="">
                                <span class="font-bold">{{ $post->user->username }}</span>
                            </div>
                            <hr>
                            <div class="mt-2">
                                <span class="font-bold">{{ $post->user->username }}</span>
                                <span>{{ $post->caption }}</span>
                                
                                <div class="flex mt-3">
                                    @if (!$post->likedBy(auth()->user()))
                                        <form action="/posts/{{ $post->id }}/likes" method="post">
                                            @csrf
                                            <button type="submit" class="text-blue-400">Like</button>
                                        </form>    
                                    @else
                                        <form action="/posts/{{ $post->id }}/unlikes" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-blue-400">Unlike</button>
                                        </form>    
                                    @endif
                                    <span class="ml-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                </div>
                                
                                
                                <a href="/likes/{{ $post->id }}" class="block mt-2 text-blue-300">View Likers</a>

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