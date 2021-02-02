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
// トップ画面への遷移
Route::get('/', function () {
    return view('pages/main/top');
});

Route::get('/home', 'HomeController@index')->name('home');

// manager権限のみ
Route::group(['middleware' => ['auth', 'can:manager']], function () {

    // knowledge関連
    // Your Post画面
    Route::get('/knowledge/yourPost', function () {
        return view('pages/knowledge/your_post');
    });
    // ノウハウ記事投稿画面表示
    Route::get('/knowledge/postArticle', 'Knowledge\PostArticleController@index');
    // ノウハウ記事投稿処理
    Route::post('/knowledge/postArticle', 'Knowledge\PostArticleController@store');

    //記事の画像をアップロード
    Route::post('/knowledge/postArticle/upload', 'Common\ImageUploadController@upload');
    //記事の画像を取得
    Route::get('/knowledge/postArticle/upload', 'Common\ImageUploadController@getImages');
    //記事の画像を削除
    Route::post('/postArticle/image/delete', 'Common\ImageUploadController@delete');

});

#region AuthRouteMethods.php auth()より移植
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
#endregion
