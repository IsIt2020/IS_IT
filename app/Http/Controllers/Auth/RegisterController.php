<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\TMember;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * RegisterUsers showRegistrationForm()を上書き
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        //入力保持用のSession削除
        session()->forget('inputs');

        //入力画面へ遷移
        return view('pages.auth.register');
    }




    /**
     * バリデーション→確認画面へ遷移
     */
    public function confirm(Request $request)
    {

        //入力データ
        $inputs = $request->only([
            'user_name',
            'mail_address',
            'user_birthdate_y',
            'user_birthdate_m',
            'user_birthdate_d',
            'user_gender',
            'password',
            'user_company'
        ]);

        //バリデーション
        $validator = $this->validator($inputs);
        if ($validator->fails()) {

            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        //Sessionに保存
        $request->session()->put('inputs', $inputs);

        //確認画面へ遷移
        return view('pages.auth.signup_confirm')
            ->with('inputs', $inputs);
    }

    /**
     * 登録
     */
    public function register(Request $request)
    {
        //セッションから登録したユーザー情報取得
        $inputs = $request->session()->get('inputs');

        //戻るボタンが押された場合 入力画面へ遷移
        if ($request->has('goBack')) {
            return redirect()->route('register')->withInput($inputs);
        }

        //tMemberインスタンス生成
        $tMember = $this->create($inputs);

        //DB 登録
        $tMember->save();

        //セッション削除
        $request->session()->forget('inputs');

        //画面遷移
        return redirect('/');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //バリデーションルール
        $rules = [
            'user_name' => ['required', 'string', 'max:255'],
            'mail_address' => ['required', 'string', 'email', 'max:255', 'unique:t_members'],
            'user_birthdate_y' => ['required'],
            'user_birthdate_m' => ['required'],
            'user_birthdate_d' => ['required'],
            'user_gender' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'company' => ['nullable', 'string', 'max:255'],
        ];

        //バリデーションエラー時のメッセージ
        $messages = [

            'mail_address.unique' => 'このメールアドレスは既に登録されています。'
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\TMember
     */
    protected function create(array $data)
    {
        return TMember::create([
            //メールアドレス
            'mail_address' => $data['mail_address'],
            //パスワード(Hash)
            'password' => Hash::make($data['password']),
            //権限:0
            'authority_flag' => 0,
            //ニックネーム
            'user_name' => $data['user_name'],
            //性別
            'user_gender' => $data['user_gender'],
            //生年月日(yyyy-MM-dd)
            'user_birthdate' => $data['user_birthdate_y'] . '-' . $data['user_birthdate_m'] . '-' . $data['user_birthdate_d'],
            //会社
            'user_company' => $data['user_company'],
            //退会フラグ:0
            'is_delete' => 0
        ]);
    }
}
