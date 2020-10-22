@extends('layouts.mainLayout')

@section('loadStyle')
<link rel="stylesheet" href="{{ asset('css/pages/sign-up.css') }}">
@endsection
@section('loadJS')
<script src="../js/sign-up.js"></script>
@endsection

@section('main-container')




    <div class="background">
        <div class="background-filter"></div>
    </div>


    <div class="input-forms">

        <h1>アカウント登録</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

          <!--ユーザー名-->
          <div class="form-group field">
              <p class="error-label" id="name-error-label"></p>
              <input type="text" class="form-field @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id='name' maxlength="50"
                  required/>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="name" class="form-label">*ユーザー名</label>
              <div class="info">
                  <div class="info-button">
                      <i class="far fa-question-circle"></i>
                  </div>
                  <div class="info-dialog">
                      <p>50文字以内　使用できない文字:</p>
                  </div>
              </div>
          </div>


          <!--e-mail-->
          <div class="form-group field">
              <p class="error-label" id="email-error-label"> </p>
              <input type="email" class="form-field @error('email') is-invalid @enderror" value="{{ old('email') }}"
              name="email" id='email' maxlength="50" required />
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="email" class="form-label">*E-Mail</label>
              <div class="info">
                  <div class="info-button">
                      <i class="far fa-question-circle"></i>
                  </div>
                  <div class="info-dialog">
                      <p>50文字以内　使用できない文字:</p>
                  </div>
              </div>
          </div>

          <!--生年月日-->
          <div style="display:flex; margin:0 10px 0 0;">
              <p class="label" id="birthday-label">*生年月日</p>
              <p class="error-label" id="birthdate-error-label" style="line-height: normal;"> </p>
          </div>
          <!-- 生年月日hidden要素 -->
          <input type="hidden" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" class="@error('birthdate') is-invalid @enderror"/>
          @error('birthdate')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div>
              <!--年-->
              <div class="form-group field date">
                  <input type="text" class="form-field date" id='birthyear' value="{{ old('birthyear') }}"
                      name='birthyear' maxlength="4" required />
                  <label for="birthyear" class="form-label">YYYY</label>
              </div>
              <!--月-->
              <div class="form-group field  date">
                  <input type="text" class="form-field date" id='birthmonth' value="{{ old('birthmonth') }}"
                      name='birthmonth' maxlength="2" required />
                  <label for="birthmonth" class="form-label">MM</label>
              </div>
              <!--日-->
              <div class="form-group field  date">
                  <input type="text" class="form-field date" id='birthday' value="{{ old('birthday') }}"
                      name='birthday' maxlength="2" required />
                  <label for="birthday" class="form-label">DD</label>

                  <div class="info">
                      <div class="info-button">
                          <i class="far fa-question-circle"></i>
                      </div>
                      <div class="info-dialog">
                          <p>半角数字で入力</p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="block-gender">
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <?php
            $genderM = "";
            $genderF = "";
            switch (old('gender')) {
              case '0':
                $genderM = " checked";
                break;
              case '1':
                $genderF = " checked";
                break;
              default:
                break;
            }
            ?>
              <div class="radio-wrap">
                  <input type="radio" id="genderM" name="gender" value="0"
                    class="toggle-switch-cb @error('gender') is-invalid @enderror" <?=$genderM?>>
                  <label class="radio-bg" for="genderM" />
                  <p>男性</p>
              </div>
              <div class="radio-wrap">
                  <input type="radio" id="genderF" name="gender" value="1" class="toggle-switch-cb" <?=$genderF?>>
                  <label class="radio-bg" for="genderF" />
                  <p>女性</p>
              </div>
          </div>

          <!--パスワード-->
          <div class="form-group field">
              <p class="error-label" id="pass-error-label"> </p>
              <input type="password" class="form-field  @error('password') is-invalid @enderror" name="password" id='pass' minlength="8"
                  maxlength="50" required />
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="pass" class="form-label">*パスワード</label>

              <div class="info">
                  <div class="info-button">
                      <i class="far fa-question-circle"></i>
                  </div>
                  <div class="info-dialog">
                      <p>8文字以上　使用できない文字:</p>
                  </div>
              </div>

              <div class="show-pass" id="show-pass" title="クリックでパスワードを表示">
                  <i class="far fa-eye"></i>
              </div>
          </div>

          <!--パスワード確認用-->
          <!-- <div class="form-group field">
              <input type="password" class="form-field"　name="password_confirmation" id='password-confirm'
              minlength="8"　maxlength="50" required />
              <label for="password-confirm" class="form-label">*パスワード確認用</label>
          </div> -->

          <!--会社名-->
          <div class="form-group field">
              <input type="input" class="form-field @error('company') is-invalid @enderror" value="{{ old('company') }}"
                  name="company" maxlength="50" id='company' />
              <label for="company" class="form-label">会社名</label>
          </div>
          @error('company')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

          <button type="submit" id="btn-confirm" class="button-general ok" disabled>確認</button>
        </form>
    </div>

@endsection
