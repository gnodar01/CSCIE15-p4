<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Nodari Gogoberidze">
        <meta charset='utf-8'>
        @stack('head')

        <title>
            @yield('title', env('APP_NAME'))
        </title>
    </head>
    <body>
        @yield('content')
        @stack('js')
    </body>
</html>
