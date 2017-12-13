<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Nodari Gogoberidze">
        <meta charset='utf-8'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href="/css/activitus.css" type='text/css' rel='stylesheet'>
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

        <header>
            <h1 class="display-1">Activitus</h1>
            @include('modules.nav')
        </header>

        <section id="main">
            @yield('content')
        </section>

        <script src="/js/activitus.js"></script>
        @stack('js')
    </body>
</html>
