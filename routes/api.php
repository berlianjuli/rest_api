<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JurusanController;
use App\Http\Controllers\Api\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
//Route::get('jurusan/{Jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('jurusan', JurusanController::class)->only([
        'store', 'update','index',
        'destroy'
    ]);
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
