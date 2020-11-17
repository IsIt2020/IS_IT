<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// manager権限のみ
Route::group(['middleware' => ['auth', 'can:manager']], function () {

});

Route::get('/kanri/postArticle', function () {
    return view('kanri/post_article');
});
// Route::post('/post', 'PostController@create');

//#region AuthRouteMethods.php auth()より移植
Route::prefix('auth')->group(function(){

    //Login Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    //Logout Route
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    //Registration Routes
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('confirm', 'Auth\RegisterController@confirm')->name('auth.confirm');

    //TODO: パスワードリセット関連は実装する??(現状:ユーザー名, E-mailが一意ではないのでユーザー入力情報から個人を特定できない)


});
//#endregion