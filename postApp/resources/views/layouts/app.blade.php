<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="p-5 bg-white shadow-sm">
        <nav class="flex justify-between items-center">
            <div>
                <a href="/dashboard" class="pr-3"><span>Dashboard</span></a>
                <a href="/home" class="pr-3"><span>Home</span></a>
                @auth
                <a href="{{ route('profile', auth()->user()->username) }}" class="pr-3"><span>Profile</span></a>
                @endauth
                <a href="/posts" class="pr-3"><span>Post</span></a>
            </div>
            <div>
                @auth
                    <a href="" class="pr-3"><span>{{ auth()->user()->username }}</span></a>
                    <form action="/logout" class="inline" method="post">
                        @csrf
                        <button type="submit" class="pr-3"><span>Logout</span></button>    
                    </form>
                @endauth

                @guest
                    <a href="/register" class="pr-3"><span>Register</span></a>
                    <a href="/login" class="pr-3"><span>Login</span></a>
                @endguest    
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>