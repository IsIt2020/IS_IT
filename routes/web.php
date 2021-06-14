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
Route::get('/', 'Main\TopController@index');

/*
|--------------------------------------------------------------------------
| 非会員
|--------------------------------------------------------------------------
*/
// トップ画面
Route::get('/home', 'HomeController@index')->name('home');
// ノウハウ投稿記事詳細画面
Route::resource('knowledge/article', 'Knowledge\ArticleController');
// ノウハウ投稿記事一覧画面
Route::resource('knowledge/list', 'Knowledge\KnowledgeListController');


/*
|--------------------------------------------------------------------------
| manager権限
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'can:manager']], function () {

    // knowledge関連
    Route::prefix('knowledge')->group(function(){
        // Your Post画面
        Route::get('/yourPost', 'Knowledge\YourPostController@index');
        // ノウハウ記事投稿関連(RESTful化)
        Route::resource('/postArticle', 'Knowledge\PostArticleController');
    });

    //記事の画像をアップロード
    Route::post('/postArticle/image/upload', 'Common\ImageUploadController@upload');
    //記事の画像を取得
    Route::get('/postArticle/image/upload', 'Common\ImageUploadController@getImages');
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
