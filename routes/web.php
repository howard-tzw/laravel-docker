<?php

use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inspire', 'InspiringController@inspire');
Route::get('/about_us', function () {
    return view('about_us', ['name' => 'Laravel 6.2 教學範例']);
});
Route::get('/test', function () {
    $post = Post::find(1);
    return $post->tags;
});
Route::get('/add', 'InspiringController@add');
Route::get('/posts', 'InspiringController@getAllPosts');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check', function () {
    $isLogin = Auth::check();
    return $isLogin ? 'true' : 'false';
});

Route::get('/who', function () {
    echo Auth::user();
});

Route::resource('posts', 'PostController');

Route::get('/zh-tw', function(){
    App::setLocale('en');
    return trans('auth.failed');
});

