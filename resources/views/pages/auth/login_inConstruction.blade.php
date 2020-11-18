@extends('layouts.mainLayout') @section('loadStyle')
<!-- components -->
<link rel="stylesheet" href="{{asset('css/components/navigation.css')}}">
<link rel="stylesheet" href="{{asset('css/components/button.css')}}">
<link rel="stylesheet" href="{{asset('css/components/toggle-switch.css')}}">
<link rel="stylesheet" href="{{asset('css/components/input-field.css')}}">
<link rel="stylesheet" href="{{asset('css/components/info-button.css')}}">
<link rel="stylesheet" href="{{asset('css/pages/sign-up.css')}}"> @endsection

<!--ページタイトル指定-->
@section('title', 'Login')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Login') @section('main-container')
<div class="main-wrap">
    <div class="main">
        <div class="background">
            <div class="background-filter"></div>
        </div>

        <div class="input-forms">
            <h1>ログイン</h1>

            <form action="{{route('login')}}" method="POST">
                <!--e-mail-->
                <div class="form-group field">
                    <p class="error-label"> </p>
                    <input type="email" class="form-field" placeholder=" " name="user_name" maxlength="50" required />
                    <label for="email" class="form-label">ユーザー名</label>
                </div>

                <!--パスワード-->
                <div class="form-group field">
                    <p class="error-label" id="pass-error-label"> </p>
                    <input type="password" class="form-field" placeholder=" " name="password" minlength="8" maxlength="50" required />
                    <label for="pass" class="form-label">パスワード</label>
                </div>

                <button id="btn-confirm" type="submit" class="button-general ok">ログイン</button>

                <!--エラーメッセージ-->
                @foreach($errors->all() as $error)
                <p style="color:#e64c65;text-align: center;">{{$error}}</p>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection