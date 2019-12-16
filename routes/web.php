<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostsController');

Route::get('/trashed-posts',[
    'uses' => 'PostsController@trashed',
    'as' => 'posts.trashed'
    ]);

Route::get('/restore-posts/{id}',[
    'uses' => 'PostsController@restore',
    'as' => 'posts.restore'
]);

Route::get('/kill-posts/{id}',[
    'uses' => 'PostsController@kill',
    'as'  => 'posts.kill'
]);

Route::resource('category','CategoryController');

Route::group(['middleware' => 'admin'],function(){

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users.index'
    ]);

    Route::delete('/rm-user/{user}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.destroy'
    ]);

    Route::get('/user/not_admin/{user}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not_admin'
    ]);

    Route::get('/user/admin/{user}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);


    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings.index'
    ]);

    Route::post('/update-settings', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);
});
