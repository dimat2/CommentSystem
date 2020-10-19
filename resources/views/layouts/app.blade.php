<!doctype html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles />
    <livewire:scripts />
</head>
<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-between px-4 bg-purple-900 text-white">
        <a class="mx-3 py-4" href="{{ url("/") }}">Home</a>
        @auth
            <livewire:logout />
        @endauth
        @guest
            <div class="py-4">
                <a class="mx-3" href="{{ url("/login") }}">Login</a>
                <a class="mx-3" href="{{ url("/register") }}">Register</a>
            </div>
        @endguest
    </div>
    <div class="my-10 w-full flex justify-center">
        @yield('content')
    </div>
</body>
</html>
