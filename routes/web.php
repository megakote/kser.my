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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/feedback', 'FeedbackController@index')->name('feedback');


Route::get('/lk', 'NewsController@index')->name('lk');

Route::get('/{slug}', function($slug){

    $page = App\Models\Page::where('slug', $slug)->first();

    return ($page) ? $page : abort(404);
});



