@extends('app')

@section('content')
    <div class="mt-8 flex justify-center">
        <div class="bg-white w-5/12">
            <div class="p-6">
                @foreach ($users as $user)
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <img class="border-1 rounded-full w-8 inline mr-3 mb-3" src="{{ $user->profile->profileImage ? asset('storage/' . $user->profile->profileImage) : asset('images/no-profile.jpg')}}">
                            <span>{{ $user->username }}</span> 
                        </div>
                        <div>
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
                        </div>
                    </div>                
                @endforeach
            </div>
        </div>
    </div>
        
@endsection