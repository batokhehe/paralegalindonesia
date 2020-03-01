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
    return view('web.layouts.home');
});
Route::get('/about', function () {
    return view('web.layouts.about');
});
Route::get('/service', function () {
    return view('web.layouts.service');
});
Route::get('/gallery', 'GalleryController@web');
Route::get('/news', 'NewsController@web');
Route::get('/contact', function () {
    return view('web.layouts.contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cms/gallery', 'GalleryController@index')->name('gallery');
Route::get('/cms/gallery/create', 'GalleryController@create')->name('gallery.create');
Route::post('/cms/gallery/store', 'GalleryController@store')->name('gallery.store');
Route::get('/cms/gallery/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
Route::post('/cms/gallery/update/{id}', 'GalleryController@update')->name('gallery.update');
Route::get('/cms/gallery/delete/{id}', 'GalleryController@delete')->name('gallery.delete');

Route::get('/cms/news', 'NewsController@index')->name('news');
Route::get('/cms/news/create', 'NewsController@create')->name('news.create');
Route::post('/cms/news/store', 'NewsController@store')->name('news.store');
Route::get('/cms/news/edit/{id}', 'NewsController@edit')->name('news.edit');
Route::post('/cms/news/update/{id}', 'NewsController@update')->name('news.update');
Route::get('/cms/news/delete/{id}', 'NewsController@delete')->name('news.delete');