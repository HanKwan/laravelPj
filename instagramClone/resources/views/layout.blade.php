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
    <div class="bg-white">
        <nav class="flex justify-between">
            <ul class="py-4 px-6 flex">
                <li class="pr-4"><a href="/home">Home</a></li>
                <li class="pr-4"><a href="">Profile</a></li>
                <li class="pr-4"><a href="">Post</a></li>
            </ul>
            <ul class="py-4 px-6 flex">
                <li class="pl-4"><a href="/register">Register</a></li>
                <li class="pl-4"><a href="/login">Login</a></li>
                <li class="pl-4"><a href="">Username</a></li>
                <li class="pl-4"><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </div>

    @yield('content')

</body>
</html>