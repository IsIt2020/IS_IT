<!-- resources/views/layouts/app.blade.phpとして保存 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>アプリ名 - @yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
        @yield('loadStyle')
    </head>
    <body>
        <!-- ここからNavigationBar -->
        @component('components.navigationbar')
        @endcomponent
        <!-- ここまでNavigationBar -->
        <div class="container">
            @yield('main-container')
        </div>
    </body>
</html>