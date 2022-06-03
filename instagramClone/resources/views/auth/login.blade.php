@extends('layout')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="bg-white w-4/12 p-8">
            <div class="flex justify-center">
                <span class="text-2xl font-bold">Insta</span>
            </div>
            <form class="mt-3 mb-8" action="/login" method="post">
                @csrf
                @if (session()->has('status'))
                    <div class="text-red-300">{{ session('status') }}</div>
                @endif
                <input class="py-1 px-2 w-full mt-3 border-2 @error('email') border-red-300 @enderror rounded" placeholder="Enter email" type="text" name="email" id="email">
                @error('email')
                    <div class="text-red-300">{{ $message }}</div>
                @enderror

                <input class="py-1 px-2 w-full mt-3 border-2 rounded @error('password') border-red-300 @enderror" placeholder="Password" type="password" name="password" id="password">
                @error('password')
                    <div class="text-red-300">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-blue-300 text-white mt-3 py-1 w-full border-1 rounded">Log In</button>
            </form>
            <span class="text-sm text-gray-600">Don't have an accont? <a href="/register" class="ml-2 text-blue-400">Sign in</a></span>
        </div>
    </div>
@endsection