<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Models\User;
use App\Models\dashboard;

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
Route::post('/add_user',[adminController::class, 'add_user'])->middleware('auth')->name('user');

Route::get('/all_user',[adminController::class, 'all_user'])->middleware('auth');
Route::get('/edit_page/{id}',[adminController::class, 'edit_page'])->middleware('auth');
Route::put('/edit_user/{id}',[adminController::class, 'edit_user'])->middleware('auth');

Route::get('/delete_user',[adminController::class, 'delete_user'])->middleware('auth');

Route::get('/settings_page',[adminController::class, 'settings_page'])->middleware('auth');
Route::get('/settings',[adminController::class, 'settings'])->middleware('auth');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/add_post', [adminController::class, 'post_page'])->middleware('auth');

require __DIR__.'/auth.php';

