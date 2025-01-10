<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ConnectFriend</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')
    <div class="mt-5 mb-6">
        @yield('content')
        @if (session('message'))
            @include('layouts.popup', ['message' => session('message')])
        @elseif (session('error'))
            @include('layouts.popup', ['error' => session('error')])
        @endif        
    </div>
    <div class="mt-5"></div>
</body>
</html>