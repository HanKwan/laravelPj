@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="py-4 px-12 bg-white">
            <form action="/register" method="post">
                @csrf
                <label class="block mt-3" for="name">Name</label>
                <input type="text" value="{{old('name')}}" class="border-2 p-1 mt-1 @error('name') border-red-500 @enderror" name="name" id="name">
                @error('name')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label class="block mt-3" for="username">Username</label>
                <input type="text" value="{{old('username')}}" class="border-2 p-1 @error('username') border-red-500 @enderror mt-1" name="username" id="username">
                @error('username')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label class="block mt-3" for="email">Email</label>
                <input type="email" value="{{old('email')}}" class="border-2 @error('email') border-red-500 @enderror p-1 mt-1" name="email" id="email">
                @error('email')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label class="block mt-3" for="password">Password</label>
                <input type="password" class="border-2 @error('password') border-red-500 @enderror p-1 mt-1" name="password" id="password">
                @error('password')
                    <div class="text-sm text-red-600">
                        {{ $message }}
                    </div>
                @enderror

                <label class="block mt-3" for="name">Confirm password</label>
                <input type="password" class="border-2 p-1 mt-1" name="password_confirmation" id="password_confirmation">

                <button type="submit" class="bg-blue-600 text-white py-1 px-2 block mt-3 w-full">Register</button>
            </form>
        </div>
    </div>
@endsection