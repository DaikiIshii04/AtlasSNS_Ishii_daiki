<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
//プロフィール画面
Route::get('/profile','UsersController@profile')->middleware('auth');
Route::post('/profile', 'UsersController@update');

Route::get('/search','UsersController@search')->middleware('auth');

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

//つぶやき登録
Route::post('/top','PostsController@post')->middleware('auth');
//つぶやき削除
Route::get('/top/{id}/delete', 'PostsController@delete');
// Route::get('/top/{id}/destroy','PostsController@destroy')->middleware('auth');
//つぶやき更新
Route::post('post/update', 'PostsController@update');
//フォローIDをコントローラーへ渡す
Route::get('/follow/{id}','FollowsController@follow');
Route::get('/unfollow/{id}','FollowsController@unfollow');
// //ユーザー検索
// Route::post('/search','UsersController@search')->middleware('auth');
// プロフィール遷移（他ユーザー）
Route::get('/{id}/users-profile', 'UsersController@usersprofile');
