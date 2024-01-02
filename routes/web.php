<?php

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

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog_details', function () {
    return view('frontend.blog_details');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
