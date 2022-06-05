@extends('app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="bg-white w-5/12 p-8">
            <div class="flex justify-center">
                <span class="text-2xl font-bold mb-6">Edit Profile</span>
            </div>
            <form class="mt-3" action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="profileImage">Profile Image</label>
                <input type="file" value="{{$user->profile->profileImage}}" name="profileImage" id="profileImage" class="mb-3"><br>

                <label for="bio">Bio</label>
                <input class="py-1 px-2 w-full mb-3 border-2 rounded" type="text" value="{{$user->profile->bio ?? null}}" name="bio" id="bio">                

                <label for="url">Url</label>
                <input class="py-1 px-2 w-full mb-6 border-2 rounded" type="text" value="{{$user->profile->url ?? null}}" name="url" id="url">
                
                <button type="submit" class="bg-blue-400 block text-white py-1 px-2 border-1 rounded">Save profile</button>
            </form>
        </div>
    </div>
@endsection