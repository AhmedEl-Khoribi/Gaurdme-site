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

//welcome
Route::get('/', 'TaskController@index');
Route::get('/homepage', 'TaskController@home');

//display tags
Route::get('/tasks/tags/{tag}', 'TagsController@index');

//create new task
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
//Delete Task
Route::get('/task/{id}/delete', 'TaskController@destroy');
//Edit Task
Route::get('/task/{id}/edit', 'TaskController@edit');
Route::patch('/edit/{id}', 'TaskController@update');

//show task & comment
Route::get('/tasks/{id}', 'TaskController@show');

//add comment
Route::post('/tasks/{task}/comment', 'CommentsController@store');

//Auth:register
Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');

//Auth:login
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');

//Auth logout
Route::get('/logout', 'SessionController@destroy');