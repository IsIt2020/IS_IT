@extends('layouts.mainLayout')

@section('loadStyle')
    <link rel="stylesheet" href="{{ asset('css/pages/sign-up.css') }}">
@endsection

<!--ページタイトル指定-->
@section('title', 'Sign Up')

<!--Navigationbarタイトル指定-->
@section('nav_title', 'Sign Up')

<!--SignUp画面にはNavigationBarの"SignUp"を表示しない-->
@section('hideSignUp', 'true')

@section('main-container')
    <div class="background">
        <div class="background-filter"></div>
    </div>
    <div class="main-wrap">
        <div class="main">

            <div class="input-forms">

                <h1 style="margin-bottom: 0;">アカウント登録</h1>
                <p style="text-align: center;margin-bottom: 15px;">この内容で登録しますか?</p>

                <p class="confirm-subject">ユーザー名</p>
                <p class="confirm-content">{{ $inputs['user_name'] }}</p>

                <p class="confirm-subject">E-mail</p>
                <p class="confirm-content">{{ $inputs['mail_address'] }}</p>

                <p class="confirm-subject">生年月日</p>
                <p class="confirm-content">
                    @isset($inputs['user_birthdate_y'])
                        {{ $inputs['user_birthdate_y'] . '/' . $inputs['user_birthdate_m'] . '/' . $inputs['user_birthdate_d'] }}
                    @else
                        {{ '未入力' }}
                    @endisset
                </p>

                <p class="confirm-subject">性別</p>
                <p class="confirm-content">
                    @isset($inputs['user_gender'])
                        @if ($inputs['user_gender'] == '0')
                            {{ '男性' }}
                        @elseif($inputs['user_gender']=='1')
                            {{ '女性' }}
                        @endif
                    @else
                        {{ '未入力' }}
                    @endisset
                </p>

                <p class="confirm-subject">会社名</p>
                <p class="confirm-content">
                    @isset($inputs['user_company'])
                        {{ $inputs['user_company'] }}
                    @else
                        {{ '未入力' }}
                    @endisset
                </p>


                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <!--登録-->
                    <button id="btn-confirm" type="submit" class="button-general ok">登録</button>

                    <!--戻る-->
                    <button type="submit" name="goBack" class="button-general cancel">戻る</button>
                </form>
            </div>
        </div>
    </div>

@endsection
