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
// Route::get('/movie/{id}', 'SocialController@movie');
Route::match(["get", "options"], '/movie/{id}', 'SocialController@movie');
Route::get('/mypage', 'SocialController@mypage');
Route::get('/review', 'SocialController@reviewTop');
Route::get('/reviews/{university}/{age}', 'SocialController@review');
Route::get('/magic_bar', 'SocialController@magic_bar');
Route::get('upload', 'SocialController@create');
Route::post('upload', 'SocialController@store');
Route::post('review_store', 'SocialController@reviewStore');
Route::get('search', 'SocialController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
