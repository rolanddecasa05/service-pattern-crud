<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    return response()->json(['message' => 'access denied'], 422);
})->name('index');

Route::post('/auth/register', [UserController::class, 'store']);
Route::post('/auth/login', [LoginController::class, 'loginUser']);

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('users', UserController::class);
    Route::resource('cars', CarController::class);
});
