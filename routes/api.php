<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\RoughController;
use App\Http\Controllers\API\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/category', CategoryController::class);
Route::apiResource('/post', PostController::class);

Route::get('/category-with-index',[RoughController::class, 'getCategory']);
Route::post('/login', [AdminController::class, 'login']);