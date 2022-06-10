@extends('app')

@section('content')
    <div class="mt-12 ml-12"><a href="/posts/{{ $post->id }}">< Back</a></div>
        <div class="mt-8 flex justify-center">
            <div class="bg-white w-5/12">
                <div class="p-6">
                    @foreach ($post->likes as $like)
                        <div class="">
                            <div class="flex items-center">
                                <img class="border-1 rounded-full w-8 inline mr-3 mb-3" src="{{ asset($like->user_profileImage) }}">
                                <span>{{ $like->user_username }}</span> 
                            </div> 
                        </div>                
                    @endforeach
                </div>
            </div>
        </div>
        
@endsection