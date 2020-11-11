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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// manager権限のみ
Route::group(['middleware' => ['auth', 'can:manager']], function () {

});

Route::get('/kanri/postArticle', function () {
    return view('kanri/post_article');
});
// Route::post('/post', 'PostController@create');
