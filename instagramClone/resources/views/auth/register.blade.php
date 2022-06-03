@extends('layout')

@section('content')
<div class="flex justify-center mt-8">
    <div class="bg-white w-4/12 p-8">
        <div class="flex justify-center">
            <span class="text-2xl font-bold">Insta</span>
        </div>
        <form class="mt-3 mb-8" action="/register" method="post">
            @csrf
            <input class="py-1 px-2 w-full mt-3 border-2 rounded @error('name') border-red-300 @enderror" value="{{ old('name') }}" placeholder="Enter name" type="text" name="name" id="name">
            @error('name')
                <div class="text-red-300">{{ $message }}</div>
            @enderror

            <input class="py-1 px-2 w-full mt-3 border-2 rounded @error('username') border-red-300 @enderror" value="{{ old('username') }}" placeholder="Enter username" type="text" name="username" id="username">
            @error('username')
                <div class="text-red-300">{{ $message }}</div>
            @enderror

            <input class="py-1 px-2 w-full mt-3 border-2 @error('email') border-red-300 @enderror rounded" value="{{ old('email') }}" placeholder="Enter email" type="text" name="email" id="email">
            @error('email')
                <div class="text-red-300">{{ $message }}</div>
            @enderror

            <input class="py-1 px-2 w-full mt-3 border-2 rounded @error('password') border-red-300 @enderror" placeholder="Password" type="password" name="password" id="password">
            @error('password')
                <div class="text-red-300">{{ $message }}</div>
            @enderror

            <input class="py-1 px-2 w-full mt-3 border-2 @error('password_confirmation') border-red-300 @enderror rounded" placeholder="Confirm password" type="password" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
                <div class="text-red-300">{{ $message }}</div>
            @enderror

            <button type="submit" class="bg-blue-300 text-white py-1 mt-6 w-full border-1 rounded">Sign In</button>
        </form>
    </div>
</div>
@endsection