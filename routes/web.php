<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
//Route::group(["middleware" => ["auth"]], function () {
Route::group(["prefix" => "api"], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get("/{id}", "App\Http\Controllers\UserController@show")->name("show");
        Route::delete("/{id}", "App\Http\Controllers\UserController@destroy")->name("destroy");
       /* Route::get("/create", "BlogController@create")->name("blogs.create");
        Route::post("/", "BlogController@store")->name("blogs.store");
        Route::get("/{id}", "BlogController@show")->name("blogs.show");
        */
    });
    Route::group(["prefix" => "book", 'as' => 'book.'], function () {
        Route::get("/{id}", "App\Http\Controllers\BookController@show")->name("show");
        Route::delete("/{id}", "App\Http\Controllers\BookController@destroy")->name("destroy");
        Route::post('/search', 'App\Http\Controllers\BookController@search')->name('search');
        Route::post('/', 'App\Http\Controllers\BookController@create')->name('create');
        Route::put('/{id}', 'App\Http\Controllers\BookController@update')->name('update');
    });
});
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
