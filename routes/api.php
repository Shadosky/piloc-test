<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstateController;
use \App\Http\Controllers\UserController;

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

Route::get('/ping', function () {
    return 'pong';
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::prefix('admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('users', 'add');
        Route::get('users', 'listAll');
        Route::get('users/{id}', 'getOne');
        Route::put('users', 'edit');
        Route::delete('users/{id}', 'delete');
    });

    Route::controller(EstateController::class)->group(function () {
        Route::post('estates', 'add');
        Route::get('estates', 'listAll');
        Route::get('estates/{id}', 'getOne');
        Route::put('estates', 'edit');
        Route::delete('estates/{id}', 'delete');
    });
});

