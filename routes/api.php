<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactController;

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

Route::post('/register', [
    UserController::class, 'registerUser'
]);

Route::post('/login', [
    UserController::class, 'loginUser'
]);

Route::get('/user', [
    UserController::class, 'getUser'
])->middleware('auth.jwt');


Route::post('/transact', [
    TransactController::class, 'addTransact'
])->middleware('auth.jwt');

Route::get('/transact', [
    TransactController::class, 'reportTransact'
])->middleware('auth.jwt');
