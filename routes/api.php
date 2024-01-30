<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('jwt.verify')->group(function(){
    Route::post('/users', [UserController::class, 'create'] );
});
