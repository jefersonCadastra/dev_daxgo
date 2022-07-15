<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DaxGo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main>
        @auth
            <x-layouts.navbar />
        @endauth
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    
</body>

</html>
