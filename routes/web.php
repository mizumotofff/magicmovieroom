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



Route::get('/', 'SocialController@index');
Route::get('/react', 'SocialController@react');
Route::post('/comment', 'SocialController@comment');
Route::post('/movie_post', 'SocialController@movie_post');
Route::get('/movie/{id}', 'SocialController@movie');
Route::get('/mypage', 'SocialController@mypage');
Route::get('/magic_bar', 'SocialController@magic_bar');
// Route::post('/movie/{id}', 'SocialController@movie');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware(['cors'])->group(function () {
//     Route::options('react', function () {
//         return response()->json();
//     });
//
//     Route::get('/react', 'SocialController@react');
// });
