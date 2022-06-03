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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'IndexPageController')->name('index');

    Route::get('/browse', 'BrowseTasksController')->name('browse.page');

    Route::get('task/{id}', 'TaskPageController')->name('task.page');

    Route::get('/search', 'SearchTaskController')->name('task.search');

    Route::get('/users', 'UsersPageController')->name('users.page');
    Route::get('/user/{id}', 'UserPageController')->name('user.page');

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/logout', 'LogoutController')->name('logout.perform');

        Route::get('/account', 'AccountPageController')->name('account.page');
        Route::get('/mylist', 'MyListPageController')->name('mylist.page');

        Route::get('/create', 'CreatePageController')->name('task-create.page');
        Route::post('/create', 'CreateTaskController')->name('task-create.perform');

        Route::post('/upload', 'UploadController@store');
        Route::post('/delete', 'UploadController@delete');

        Route::get('/messages/{taskId}', 'FetchMessagesController');
        Route::post('/messages/{taskId}', 'SendMessageController');

    });

    Route::group(['middleware' => ['guest']], function() {

        Route::view('/signup', 'auth.signup')->name('register.page');
        Route::post('/signup', 'RegisterController')->name('register.perform');

        Route::view('/signin', 'auth.signin')->name('login.page');
        Route::post('/signin', 'LoginController')->name('login.perform');

    });
});

