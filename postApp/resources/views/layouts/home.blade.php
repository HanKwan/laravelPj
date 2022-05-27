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
                @endforeach
            @else
                There is no post yet
            @endif
        </div>
    </div>
@endsection