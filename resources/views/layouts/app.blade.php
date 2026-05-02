<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
    </head>
    <body>
        <header class="bg-gray-800 text-white p-4">
            <h1 class="text-3xl font-bold p-2">Contact Management Web App</h1>
        </header>
        @yield('content')
        <script src="https://kit.fontawesome.com/a184b40f21.js" crossorigin="anonymous"></script>
    </body>
</html>
