<?php

use Illuminate\Http\Request;

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

Route::get('/getstudents/','StudentsController@getStudents');
Route::get('/addstudents/','StudentsController@addStudents');
Route::patch('/updatestudents/','StudentsController@updateStudents');

Route::get('/registrstudents/','StudentsController@registerStudents');
Route::get('/singstudents/','StudentsController@singStudents');




