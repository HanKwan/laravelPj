@extends('app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="bg-white w-5/12 p-8">
            <div class="flex justify-center">
                <span class="text-2xl font-bold mb-6">Create Post</span>
            </div>
            <form class="mt-3" action="/posts" method="post" enctype="multipart/form-data">
                @csrf
                <label for="postImage">Post Image</label><br>
                <input type="file" value="" name="postImage" id="postImage" class="mb-2"><br>
                @error('postImage')
                    <div class="text-red-400 mb-3">{{ $message }}</div>
                @enderror

                <label class="mt-3" for="caption">Caption</label>
                <input class="py-1 px-2 w-full border-2 rounded @error('caption') border-red-400 @enderror" type="text" value="{{ old('caption') }}" name="caption" id="caption">
                @error('caption')
                    <div class="text-red-400 mb-2">{{ $message }}</div>
                @enderror                
                
                <button type="submit" class="bg-blue-400 block text-white py-1 px-3 mt-3 border-1 rounded">Post</button>
            </form>
        </div>
    </div>
@endsection