<!-- resources/views/layouts/app.blade.phpとして保存 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アプリ名 - @yield('title')</title>
    <!--Styles -->

    <!-- アプリ共通 -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    <!--components-->
    <link rel="stylesheet" href="{{ asset('css/components/article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/code-hilight.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/input-field.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/tag.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/toggle-switch.css') }}">

    <!--pages-->
    @yield('loadStyle')

    <!--scripts-->
    <!-- アプリ共通 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/StyleControl.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>

    <!--pages-->
    @yield('loadJS')
</head>

<body>
    <!-- ここからnavigation bar -->
    @component('components.navigationbar')
    @endcomponent
    <!-- ここまでnavigation bar -->

    @yield('main-container')

    <!-- ここからfooter -->
    @component('components.footer')
    @endcomponent
    <!-- ここまでfooter -->
</body>

</html>
