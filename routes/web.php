<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StaticsController@index')->name('home');
Route::get('mall', 'StaticsController@mall')->name('mall');

# 用户CRUD
Route::resource('users', 'UsersController');

# 登录登出
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

# 激活账户
Route::get('users/confirm/{token}', 'UsersController@confirmEmail')->name('users.confirm');

# 找回密码
Route::get('password/find', 'PasswordController@showFindForm')->name('password.find');
Route::post('password/find', 'PasswordController@sendLinkEmail')->name('password.email');

# 重置密码
Route::get('password/reset/{token}', 'PasswordController@showResetForm')->name('password.reset');
Route::put('password/reset', 'PasswordController@reset')->name('password.update');

# 动态路由
Route::resource('posts', 'PostsController');

# 关注列表 & 粉丝列表
Route::get('users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('users/{user}/followers', 'UsersController@followers')->name('users.followers');

# 关注 & 取消关注
Route::post('users/followers/{user}', 'UsersController@follow')->name('users.follow');
Route::delete('user/followers/{user}', 'UsersController@follow')->name('users.unfollow');