<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', function () {
    return view('dashboard');
});

Auth::routes(['register' => false]);

Route::get('/berita/{slug}', [ViewsController::class, 'index'])->name('berita');

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('wisata', WisataController::class);
Route::resource('category', CategoryController::class);
Route::resource('post', PostController::class);

