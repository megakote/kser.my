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




Route::get('/get', function () {
    dispatch(new App\Jobs\Parsers\GetUsers());
    dispatch(new App\Jobs\Parsers\GetOrders());
//    dispatch(new App\Jobs\Export\PutForms());
    return;
});
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/news/{slug?}', 'NewsController@index')->name('news');
Route::get('/articles/{slug?}', 'ArticlesController@index')->name('articles');
Route::get('/feedback', 'FeedbackController@index')->name('feedback');
Route::post('/feedback/add', 'FeedbackController@store')->name('feedback.add');


Route::get('/lk', 'LkController@index')->name('lk');


Route::get('/search', 'SearchController@index')->name('search');
Route::get('/contacts', 'PagesController@contacts')->name('contacts');
Route::get('/about', 'PagesController@about')->name('about');

Route::get('/page/{slug}', function($slug){

    $page = App\Models\Page::where('slug', $slug)->first();

    return ($page) ? view('page', $page) : abort(404);
});



