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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(["middleware" => "api"], function ($router) {

    Route::group(["prefix" => "auth"], function () {
        Route::post("login", "App\Http\Controllers\Auth\AuthController@login")->name("login");
        Route::post("logout", "App\Http\Controllers\Auth\AuthController@logout")->name("logout");
        Route::post("refresh", "App\Http\Controllers\Auth\AuthController@refresh")->name("refresh");
        Route::post("me", "App\Http\Controllers\Auth\AuthController@me")->name("me");
    });
    Route::group(["prefix" => "user"], function () {
        Route::post('/', 'App\Http\Controllers\Auth\RegisterController@create')->name('create');

    });

    Route::group(["prefix" => "book"], function () {
        Route::delete("/{id}", "App\Http\Controllers\BookController@destroy")->name("destroy");
        Route::post('/', 'App\Http\Controllers\BookController@create')->name('create');
        Route::post('/update', 'App\Http\Controllers\BookController@update')->name('update');
        Route::get("/{id}", "App\Http\Controllers\BookController@show")->name("show");
        Route::post('/search', 'App\Http\Controllers\BookController@search')->name('search');

    });

    Route::group(["prefix" => "category"], function () {
        Route::delete("/{id}", "App\Http\Controllers\CategoryController@destroy")->name("destroy");
        Route::post('/', 'App\Http\Controllers\CategoryController@create')->name('create');
        Route::post('/update', 'App\Http\Controllers\CategoryController@update')->name('update');
        Route::get("/{id}", "App\Http\Controllers\CategoryController@show")->name("show");
        Route::post('/search', 'App\Http\Controllers\CategoryController@search')->name('search');

    });    
    Route::group(["prefix" => "rate"], function () {
        Route::delete("/{id}", "App\Http\Controllers\RateController@destroy")->name("destroy");
        Route::post('/', 'App\Http\Controllers\RateController@create')->name('create');
        Route::put('/{id}', 'App\Http\Controllers\RateController@update')->name('update');
        Route::get("/{id}", "App\Http\Controllers\RateController@show")->name("show");
        Route::post('/search', 'App\Http\Controllers\RateController@search')->name('search');

    });  
});

