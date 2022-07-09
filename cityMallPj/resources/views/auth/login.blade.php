@extends('app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="mt-4 fs-6 mb-3 w-100 px-3 p-md-0">
                <h4>Returning Customer</h4>
                <span class="text-muted ">Already have an account? Sign in to retrieve your account settings.</span>
            </div>
            <form class="container border py-2 px-4" action="/login" method="post">
                @csrf
                @if (session()->has('status'))
                    <span class="text-danger fs-6">{{ session('status') }}</span>
                @endif
                <div class="mb-2">
                    <label for="email">Email</label><br>
                    <input class="w-100 border @error('email') border-danger @enderror" type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="fs-6 text-danger">
                            {{ $message }}
                        </div>
                    @enderror    
                </div>

                <div class="mb-2">
                    <label for="password">Password</label><br>
                    <input class="w-100 border @error('password') border-danger @enderror" type="password" name="password" id="password">
                    @error('password')
                        <div class="fs-6 text-danger">
                            {{ $message }}
                        </div>
                    @enderror    
                </div>
                <button class="w-100 text-center btn btn-primary py-1 my-2" type="submit">Login</button>
                <hr>
                <div class="fs-6">
                    <span>Don't have an account? <a class="ms-2" href="/register">Register</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection