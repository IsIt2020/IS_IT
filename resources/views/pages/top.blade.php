@extends('layouts.mainLayout')
@section('loadStyle')
    <!-- components -->
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/toggle-switch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/input-field.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/info-button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/sign-up.css') }}">
@endsection

<!--ページタイトル指定-->
@section('title', 'Top')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Login')

@section('main-container')

@endsection