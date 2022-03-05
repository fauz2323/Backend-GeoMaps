<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/webApiCat', [ApiController::class, 'index']);
Route::get('/categoryName/{id}', [ApiController::class, 'categoryName']);
Route::get('/photo/{id}', [ApiController::class, 'photos']);
Route::get('/webApiAll', [ApiController::class, 'wisataAll']);
Route::get('/wisata/{id}', [ApiController::class, 'wisata']);
Route::get('/post', [ApiController::class, 'beritaPost']);
