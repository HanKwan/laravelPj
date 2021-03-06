@extends('app')

@section('content')
    <div class="flex justify-center mt-6">
        <div class="w-8/12 grid grid-cols-3">
            <div class="flex justify-center items-center p-2">
                <img src="{{ $user->profile->profileImage ? asset('storage/' . $user->profile->profileImage) : asset('images/no-profile.jpg')}}" class="border-1 rounded-full w-8/12">
            </div>
            <div class="grid grid-rows-3 col-span-2 p-6">
                <div class="flex justify-between items-center">
                    <div class="flex mb-2">
                        <div class="font-md text-3xl mr-4">{{ $user->name }}</div>
                        
                        @if (auth()->user()->id === $user->profile->user_id)
                        
                        @else
                            @if (!$user->profile->followBy($user))
                                <form action="/follow/{{ $user->id }}" method="post">
                                    @csrf
                                    <button class="py-1 px-2 text-white bg-blue-400 border-1 rounded" type="submit">Follow</button>
                                </form>
                            @else
                                <form action="/unfollow/{{ $user->id }}" method="post">
                                    @csrf
                                    <button class="py-1 px-2 text-white bg-blue-400 border-1 rounded" type="submit">Unfollow</button>
                                </form>
                            @endif
                        @endif
                    </div>

                    @can('update', $user->profile)
                        <a href="/profile/{{$user->username}}/edit"><span><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></span></a>
                    @endcan
                </div>
                <div class="flex justify-between w-7/12">
                    <span><strong>{{ $user->posts->count() }}</strong> {{ Str::plural('post', $user->posts->count()) }}</span>
                    <span><strong>{{ $user->profile->followers->count() }}</strong> followers</span>
                    <span><strong>{{ $user->following->count() }}</strong> following</span>
                </div>
                <div>
                    <div class="font-bold">{{ $user->username }}</div>
                    <div>{{$user->profile->bio}}</div>
                    <div><a href="">{{$user->profile->url ?? null}}</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <div class="grid grid-cols-3 gap-5 w-10/12">
            @foreach ($user->posts as $post)
                <div><a href="/posts/{{ $post->id }}"><img src="{{ asset('storage/' . $post->postImage) }}" class="w-full h-full"></a></div>                
            @endforeach
        </div>
    </div>
@endsection