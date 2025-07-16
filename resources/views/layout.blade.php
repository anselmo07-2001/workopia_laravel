<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/css/app.css")
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title ?? "Workopia | Find the list jobs" }}</title>

</head>
<body class="bg-gray-100">
    <x-header />
    @if (request()->is("/"))
        <x-hero/>    
    @endif
    <main>{{ $slot }}</main>

    <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>