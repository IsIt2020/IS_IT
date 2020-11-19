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
@section('loadJS')
    <script src="{{ asset('js/sign-up.js') }}"></script>
    <script src="{{ asset('js/StyleControl.js') }}"></script>
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

            <!-- <div class="background">
                <div class="background-filter"></div>
            </div> -->


            <div class="input-forms">

                <h1>アカウント登録</h1>

                <form action="{{ route('auth.confirm') }}" name="confirm" method="post">
                    @csrf
                    <!--ユーザー名-->
                    <div class="form-group field">
                        <p class="error-label" id="name-error-label"></p>
                        <input type="text" name="user_name" class="form-field" placeholder=" " id='name' maxlength="50"
                            required value="{{ old('user_name') }}" />
                        <label for="name" class="form-label">*ユーザー名</label>
                        <div class="desc">
                            <p>50文字以内　使用できない文字:</p>
                        </div>
                    </div>


                    <!--e-mail-->
                    <div class="form-group field">
                        <p class="error-label" id="email-error-label"> </p>
                        <input type="email" name="mail_address" class="form-field" placeholder=" " id='email' maxlength="50"
                            required value="{{ old('mail_address') }}" />
                        <label for="email" class="form-label">*E-Mail</label>
                        <div class="desc">
                            <p>50文字以内　使用できない文字:</p>
                        </div>
                    </div>

                    <!--生年月日-->
                    <div style="display:flex; margin:0 10px 0 0; color:#666">
                        <p class="label" id="birthday-label">*生年月日</p>
                        <p class="error-label" id="birthdate-error-label" style="line-height: normal;"> </p>
                    </div>
                    <div>
                        <!--年-->
                        <div class="form-group field date">
                            <input type="text" name="user_birthdate_y" value="{{ old('user_birthdate_y') }}"
                                class="form-field date" placeholder=" " id='birthyear' value="" maxlength="4" required />
                            <label for="birthyear" class="form-label">YYYY</label>
                        </div>
                        <!--月-->
                        <div class="form-group field  date">
                            <input type="text" name="user_birthdate_m" value="{{ old('user_birthdate_m') }}"
                                class="form-field date" placeholder=" " id='birthmonth' value="" maxlength="2" required />
                            <label for="birthmonth" class="form-label">MM</label>
                        </div>
                        <!--日-->
                        <div class="form-group field  date">
                            <input type="text" name="user_birthdate_d" value="{{ old('user_birthdate_d') }}"
                                class="form-field date" placeholder=" " id='birthday' value="" maxlength="2" required />
                            <label for="birthday" class="form-label">DD</label>
                        </div>
                    </div>

                    <div class="block-gender">
                        <div class="radio-wrap" style="margin: 0 20px">
                            <input type="radio" name="user_gender" id="genderM" value="0" class="toggle-switch-cb"
                                {{ old('user_gender') == '0' ? 'checked' : '' }}>
                            <label class="radio-bg" for="genderM"></label>
                            <label class="radio-text" for="genderM"> 男性</label>
                        </div>
                        <div class="radio-wrap" style="margin: 0 20px">
                            <input type="radio" name="user_gender" id="genderF" value="1" class="toggle-switch-cb"
                                {{ old('user_gender') == '1' ? 'checked' : '' }}>
                            <label class="radio-bg" for="genderF" ></label>
                            <label class="radio-text" for="genderF">女性</label>
                        </div>
                    </div>

                    <!--パスワード-->
                    <div class="form-group field">
                        <p class="error-label" id="pass-error-label"> </p>
                        <input type="password" name="password" class="form-field" placeholder=" " id='pass' minlength="8"
                            maxlength="50" required />
                        <label for="pass" class="form-label">*パスワード</label>

                        <div class="desc">
                            <p>8文字以上　使用できない文字:</p>
                        </div>

                        <div class="show-pass" id="show-pass" title="クリックでパスワードを表示">
                            <i class="far fa-eye"></i>
                        </div>
                    </div>

                    <!--会社名-->
                    <div class="form-group field">
                        <input type="input" name="user_company" class="form-field" placeholder=" " maxlength="50"
                            id='company' value="{{ old('user_company') }}" />
                        <label for="company" class="form-label">会社名</label>

                        <div class="desc">
                            <p>50文字以内　使用できない文字:</p>
                        </div>
                    </div>

                    <button id="btn-confirm" class="button-general ok">確認</button>

                    @foreach ($errors->all() as $error)
                        <p style="color:#e64c65; text-align:center">{{ $error }}</p>
                    @endforeach

                </form>
            </div>
        </div>
    </div>
@endsection