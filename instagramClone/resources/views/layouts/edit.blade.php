@extends('app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="bg-white w-5/12 p-8">
            <div class="flex justify-center">
                <span class="text-2xl font-bold mb-6">Edit Profile</span>
            </div>
            <form class="mt-3" action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="bio">Bio</label>
                <input class="ml-3 py-1 px-2 w-10/12 mb-3 border-2 rounded" type="text" value="{{ $user->profile->bio ?? null }}" name="bio" id="bio">
                <br>
                <label for="url">Url</label>
                <input class="ml-3 py-1 px-2 w-10/12 mb-6 border-2 rounded" type="text" value="{{ $user->profile->url ?? null }}" name="url" id="url">
                
                <button type="submit" class="bg-blue-400 block text-white py-1 px-2 border-1 rounded">Save profile</button>
            </form>
        </div>
    </div>
@endsection