<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Models\User;

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
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog_details', function () {
    return view('frontend.blog_details');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});


Route::get('/admin',[adminController::class, 'admin'])->middleware('auth')->name('admin');
Route::get('/user',[adminController::class, 'user'])->middleware('auth')->name('user');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/add_post', [adminController::class, 'post_page']);

require __DIR__.'/auth.php';

