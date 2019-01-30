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

//manage projects
Route::get('/manage_project','ManageProjectsController@index')->name('manage_project');

//manage tasks
Route::get('/manage_task','ManageTasksController@index')->name('manage_task');


//view task


//view task url



//



