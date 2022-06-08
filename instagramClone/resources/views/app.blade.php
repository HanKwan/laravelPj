<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Instagram clone(kinda)</title>
</head>
<body class="bg-gray-100">
    <div class="bg-white shadow-sm">
        <nav class="flex justify-between">
            <ul class="py-4 px-6 flex">
                <li class="pr-4"><a href="/home">Home</a></li>
                @auth
                    <li class="pr-4"><a href="{{ route('profile.index', auth()->user()->username) }}">Profile</a></li>
                @endauth
                <li class="pr-4"><a href="/posts/create">Post</a></li>
            </ul>
            <ul class="py-4 px-6 flex">
                @guest
                    <li class="pl-4"><a href="/register">Register</a></li>
                    <li class="pl-4"><a href="/login">Login</a></li>    
                @endguest
                @auth
                    <li class="pl-4"><a href="">{{ auth()->user()->username }}</a></li>
                    <li class="pl-4">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>

    @yield('content')

</body>
</html>