@extends('app')

@section('content')
    <div class="flex justify-center mt-6">
        <div class="w-8/12 grid grid-cols-3">
            <div class="flex justify-center items-center p-2">
                <img src="{{ $user->profile->profileImage ? asset('storage/' . $user->profile->profileImage) : asset('images/no-profile.jpg')}}" class="border-1 rounded-full w-8/12">
            </div>
            <div class="grid grid-rows-3 col-span-2 p-6">
                <div class="flex justify-between items-center">
                    <div class="font-md text-3xl">{{ $user->name }}</div>

                    @can('update', $user->profile)
                        <a href="/profile/{{$user->username}}/edit">Edit Profile</a>
                    @endcan
                </div>
                <div class="flex justify-between w-7/12">
                    <span><strong>{{ $user->posts->count() }}</strong> {{ Str::plural('post', $user->posts->count()) }}</span>
                    <span><strong>0</strong> follower</span>
                    <span><strong>1</strong> following</span>
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