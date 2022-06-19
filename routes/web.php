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

    Route::get('/search-task', 'SearchTaskController')->name('task.search');
    Route::get('/search-user', 'SearchUserController')->name('user.search');

    Route::get('/users', 'UsersPageController')->name('users.page');
    Route::get('/user/{id}', 'UserPageController')->name('user.page');

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/logout', 'LogoutController')->name('logout.perform');

        Route::get('/account', 'AccountPageController')->name('account.page');
        Route::put('/account', 'AccountChangeController')->name('account.change');

        Route::get('/mylist', 'MyListPageController')->name('mylist.page');

        Route::get('/create', 'CreatePageController')->name('task-create.page');
        Route::post('/create', 'CreateTaskController')->name('task-create.perform');

        Route::group(['prefix' => 'files'], function() {
            Route::post('/upload', 'FileController@store');
            Route::post('/delete', 'FileController@delete');
            Route::get('/download/{fileId}', 'FileController@download')->name('file.download');
        });

        Route::group(['prefix' => 'responses'], function() {
            Route::post('{taskId}/post', 'CreateResponseController')->name('response.store');
            Route::delete('/delete/{responseId}', 'ResponseController@delete')->name('response.delete');
            Route::put('/accept/{responseId}', 'ResponseController@accept')->name('response.accept');
        });

        Route::group(['prefix' => 'messages'], function() {
            Route::get('/{taskId}', 'FetchMessagesController');
            Route::post('/{taskId}', 'SendMessageController');
        });

        Route::group(['prefix' => 'task'], function() {
            Route::put('/{taskId}/refuse', 'RefuseTaskController')->name('task.refuse');
            Route::put('/{taskId}/complete', 'CompleteTaskController')->name('task.complete');
        });

        Route::group(['prefix' => 'user'], function() {
            Route::post('/{id}/add-fav', 'FavouriteController@add')->name('favourites.add');
            Route::delete('/{id}/del-fav', 'FavouriteController@delete')->name('favourites.delete');
        });
    });

    Route::group(['middleware' => ['guest']], function() {

        Route::view('/signup', 'auth.signup')->name('register.page');
        Route::post('/signup', 'RegisterController')->name('register.perform');

        Route::view('/signin', 'auth.signin')->name('login.page');
        Route::post('/signin', 'LoginController')->name('login.perform');

    });
});

