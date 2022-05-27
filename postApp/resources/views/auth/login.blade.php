@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="py-4 px-12 bg-white">
            <form action="/login" method="post">
                @csrf
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
                <button type="submit" class="bg-blue-600 text-white py-1 px-2 block mt-3 w-full">Login</button>
            </form>
        </div>
    </div>        
@endsection