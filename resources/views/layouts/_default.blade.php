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
    <div class="my-0 mx-auto w-10/12 lg:w-4/5 py-5">
        @yield('content')
    </div>
    @include('layouts._footer')
</body>
</html>