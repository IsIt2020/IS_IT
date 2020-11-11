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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- NavigationBar -->
        <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
        <!-- footer -->
        <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
        @yield('loadStyle')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="{{ asset('js/StyleControl.js') }}"></script>
        @yield('loadJS')
    </head>
    <body>
        <!-- ここからNavigationBar -->
        @component('components.navigationbar')
        @endcomponent
        <!-- ここまでNavigationBar -->
        <div class="container-fluid">
            @yield('main-container')
        </div>
        <!-- ここからfooter -->
        @component('components.footer')
        @endcomponent
        <!-- ここまでfooter -->
    </body>
</html>
