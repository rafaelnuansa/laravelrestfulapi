<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //route login
    Route::post('/login', [App\Http\Controllers\Api\Admin\LoginController::class, 'index']);

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth:api'], function () {
        //data user
        Route::get('/user', [App\Http\Controllers\Api\Admin\LoginController::class, 'getUser']);
        //refresh token JWT
        Route::get('/refresh', [App\Http\Controllers\Api\Admin\LoginController::class, 'refreshToken']);
        //logout
        Route::post('/logout', [App\Http\Controllers\Api\Admin\LoginController::class, 'logout']);
        //Tags
        Route::apiResource('/tags', App\Http\Controllers\Api\Admin\TagController::class);
        //Category
        Route::apiResource('/categories', App\Http\Controllers\Api\Admin\CategoryController::class);

        //Poss
        Route::apiResource('/posts', App\Http\Controllers\Api\Admin\PostController::class);

        //Menus
        Route::apiResource('/menus', App\Http\Controllers\Api\Admin\MenuController::class);

        //Sliders
        Route::apiResource('/sliders', App\Http\Controllers\Api\Admin\SliderController::class);

        //Users
        Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class);

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Api\Admin\DashboardController::class, 'index']);
    });

});
