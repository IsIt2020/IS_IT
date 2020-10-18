<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\MemberTable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'gender'=> ['required'],
            'birthdate'=> ['required'],
            'company' => ['nullable', 'string','max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\MemberTable
     */
    protected function create(array $data)
    {
        return MemberTable::create([
          'MAIL_ADDRESS' => 'email',
          'PASSWORD' => 'password',
          'USER_NAME' => 'name',
            'MAIL_ADDRESS' => $data['email'],
            'PASSWORD' => Hash::make($data['password']),
            'USER_NAME' => $data['name'],
            'USER_GENDER' => $data['gender'],
            'USER_BIRTHDATE' => $data['birthdate'],
            'USER_COMPANY' => $data['company'],
        ]);
    }
}
