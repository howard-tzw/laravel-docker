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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inspire', 'InspiringController@inspire');
Route::get('/about_us', function () {
    return view('about_us', ['name' => 'Laravel 6.2 教學範例']);
});
Route::get('/test', function() {
    $post = App\Models\Post::find(1);
    return $post->tags;
});
Route::get('/add', 'InspiringController@add');
Route::get('/posts', 'InspiringController@getAllPosts');