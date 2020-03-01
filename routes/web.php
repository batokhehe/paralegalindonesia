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
Route::get('/gallery', function () {
    return view('web.layouts.gallery');
});
Route::get('/news', function () {
    return view('web.layouts.news');
});
Route::get('/contact', function () {
    return view('web.layouts.contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
