<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>@yield('title', config('app.name'))</title>
</head>
<body>
    @include('layouts._header')
    <div class="2xl:max-w-screen-2xl xl:max-w-screen-xl px-4 mx-auto">
        @include('shared._errors')   
        @include('shared._message')
        @yield('content')
    </div>
    @include('layouts._footer')
</body>
</html>