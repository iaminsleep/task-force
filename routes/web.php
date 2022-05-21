<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/browse', 'PageController@allTasks')->name('browse');
    Route::get('task/{id}', 'TaskController@show')->name('task.show');

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/logout', 'UserController@logout')->name('logout.perform');
        
        Route::get('/account', function () { return view('account'); })->name('account');;

        Route::get('/create', 'TaskController@createPage')->name('task.create-page');
        Route::post('/create', 'TaskController@create')->name('task.create');

        Route::get('/messages', [ChatController::class, "fetchMessages"]);
        Route::post('/messages', [ChatController::class, "sendMessage"]);

    });

    Route::group(['middleware' => ['guest']], function() {

        Route::get('/signup', function () { return view('auth.signup'); })->name('register.page');
        Route::post('/signup', 'UserController@register')->name('register.perform');

        Route::get('/signin', function () { return view('auth.signin'); })->name('login.page');
        Route::post('/signin', 'UserController@login')->name('login.perform');
        
    });
});

