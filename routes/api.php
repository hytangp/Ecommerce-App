<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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

Route::get('/getusers',[UserController::class,'getUsers'])->name('api_Get-User');

Route::post('/createuser',[UserController::class,'createUser'])->name('api_Create-User');

Route::put('/edituser/{id}',[UserController::class,'editUser'])->name('api_Edit-User');

Route::delete('/deleteuser/{id}',[UserController::class,'deleteUser'])->name('api_Delete-User');
