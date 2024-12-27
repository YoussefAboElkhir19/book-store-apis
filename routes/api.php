<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Auth
    Route::controller(AuthController::class)
        ->prefix('auth')
        ->group(function () {
            Route::post('logout', 'logout');
            Route::post('logout-all', 'logout_all');
            Route::post('change-password', 'change_password');
        });
    //USER
    Route::controller(UserController::class)
        ->prefix('users')
        ->group(function () {
            Route::get('trashed', 'trashed')->middleware('role:hr|admin|moderator');
            Route::put('{id}/restore', 'restore');
        });

    Route::apiResource('users', UserController::class);



    //Author
    Route::controller(AuthorController::class)
        ->prefix('authors')
        ->group(function () {
            Route::get('trashed', 'trashed');
            Route::put('{id}/restore', 'restore');
        });
    Route::apiResource('authors', AuthorController::class);


    // Topic
    Route::controller(TopicController::class)
        ->prefix('topics')
        ->group(function () {
            Route::get('trashed', 'trashed');
            Route::put('{id}/restore', 'restore');
        });
    Route::apiResource('topics', TopicController::class);


    // Book
    Route::controller(BookController::class)
        ->prefix('books')
        ->group(function () {
            Route::get('trashed', 'trashed')->middleware(CheckRole::class);
            Route::put('{id}/restore', 'restore');
        });
    Route::resource('books', BookController::class);


    //Languages
    Route::controller(LanguageController::class)
        ->prefix('languages')
        ->group(function () {
            Route::get('trashed', 'trashed');
            Route::put('{id}/restore', 'restore');
        });
    Route::resource('languages', LanguageController::class);
});
