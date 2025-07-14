<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Workopia | Find the list jobs" }}</title>
</head>
<body>
    <x-header />
    <main>{{ $slot }}</main>
</body>
</html>