<?php

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
// untuk cek register email
Route::get('register/check', [App\Http\Controllers\Auth\RegisterController::class, 'check'])->name('api-register-check');

Route::get('districts', [App\Http\Controllers\API\LocationController::class, 'districts'])->name('api-districts');
Route::get('villages/{districts_id}', [App\Http\Controllers\API\LocationController::class, 'villages'])->name('api-villages');




