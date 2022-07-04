@extends('app')

@section('content')
<div class="row justify-content-center container">
    <div class="col-md-5">
        <div class="mt-4 fs-6 mb-3 w-100">
            <h4>Create an account</h4>
            <span class="text-muted ">For a fast checkout, easy access to previous orders, and the ability to create an address book and store settings. Register below.</span>
        </div>
        <form class="container border py-2 px-4" action="/register" method="post">
            @csrf
            @if (session()->has('status'))
                <span class="text-danger fs-6">{{ session('status') }}</span>
            @endif

            <div class="mb-2">
                <label for="name">Name</label><br>
                <input class="w-100 @error('name') border-danger @enderror" type="name" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="fs-6 text-danger">
                        {{ $message }}
                    </div>
                @enderror    
            </div>

            <div class="mb-2">
                <label for="email">Email</label><br>
                <input class="w-100 @error('email') border-danger @enderror" type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="fs-6 text-danger">
                        {{ $message }}
                    </div>
                @enderror    
            </div>

            <div class="mb-2">
                <label for="password">Password</label><br>
                <input class="w-100 @error('password') border-danger @enderror" type="password" name="password" id="password">
                @error('password')
                    <div class="fs-6 text-danger">
                        {{ $message }}
                    </div>
                @enderror    
            </div>

            <div class="mb-2">
                <label for="password_confirmation">Confirm password</label><br>
                <input class="w-100" type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button class="w-100 text-center btn btn-primary py-1 my-2" type="submit">Register Now</button>
        </form>
    </div>
</div>
@endsection