@extends('app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 text-center">
                <form action="#">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter name">
                </form>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <form class="ms-5" action="/register" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="name">Name</label><br>
                            <input type="text" name="name" id="name">
                        </div>

                        <div class="mb-2">
                            <label for="email">Email</label><br>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="mb-2">
                            <label for="password">Password</label><br>
                            <input type="password" name="password" id="password">
                        </div>

                        <div class="mb-2">
                            <label for="confirm password">Confirm password</label><br>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button class="btn btn-primary py-1 mt-2" type="submit">Register now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection