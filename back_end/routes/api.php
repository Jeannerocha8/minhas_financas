<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::post('/category/index', [CategoryController::class, 'index']);
Route::delete('/category/delete/{categoryId}', [CategoryController::class, 'delete']);
Route::put('/category/update/{categoryId}', [CategoryController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
