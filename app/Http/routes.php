<?php
use App\Task;
use App\User;


//  =========================
//  CRUD APPLICATION
//  ===========================
Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'TaskController@home',
        'as' => 'tasks.welcome'
    ]);
    Route::get('/tasks/createUser', [
        'uses' => 'TaskController@createUser',
        'as' => 'tasks.createUser'
    ]);

    Route::get('/editUser/{id}', [
        'uses' => 'TaskController@editUser',
        'as' => 'tasks.editUser'
    ]);
    Route::get('/showUser/{id}', [
        'uses' => 'TaskController@showUser',
        'as' => 'tasks.showUser'
    ]);
    Route::get('/assignUser/{id}', [
        'uses' => 'TaskController@assignUser',
        'as' => 'tasks.assignUser'
    ]);
    Route::get('/userList', [
        'uses' => 'TaskController@users',
        'as' => 'tasks.users'
    ]);
    Route::resource('/tasks', 'TaskController');

    Route::resource('/users', 'UserController');

});

