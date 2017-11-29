<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Nodari Gogoberidze">
        <meta charset='utf-8'>

        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        @stack('head')

        <title>
            @yield('title', env('APP_NAME'))
        </title>
    </head>
    <body>
        @if(session('alert'))
            <div class='alert'>
                {{ session('alert') }}
            </div>
            <br>
        @endif
        @yield('content')
        @stack('js')
    </body>
</html>
