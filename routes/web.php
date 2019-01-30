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


//manage users
Route::get('/manage_user','ManageUsersController@index')->name('manage_user');

Route::get('/manage_user/create','ManageUsersController@create')->name('create_user');

Route::post('/manage_user','ManageUsersController@store')->name('user.store');




//manage projects
Route::get('/manage_project','ManageProjectsController@index')->name('manage_project');

Route::get('/manage_project/create','ManageProjectsController@create')->name('create_project');

Route::post('/manage_project','ManageProjectsController@store')->name('project.store');



//manage tasks
Route::get('/manage_task','ManageTasksController@index')->name('manage_task');

Route::get('/manage_task/create','ManageTasksController@create')->name('create_task');

Route::post('/manage_task','ManageTasksController@store')->name('task.store');












//view task


//view task url



//



