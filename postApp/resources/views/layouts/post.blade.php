@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="py-4 px-12 w-8/12 bg-white">
            <form action="/posts" method="post">
                @csrf
                <label class="block mt-3 text-lg text-bold" for="body">Post</label>
                <textarea class="w-full h-[5rem] border-2 @error('body') border-red-500 @enderror p-1 mt-1" placeholder="What's on your mind?" name="body" id="body"></textarea>
                @error('body')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="bg-blue-600 text-white py-1 border-1 rounded px-2 block mt-3">post</button>
            </form>
        </div>
    </div>
@endsection