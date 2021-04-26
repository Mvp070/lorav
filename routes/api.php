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

Route::get('/registervalid/','StudentsController@registerValid');
Route::get('/loginvalid/','StudentsController@loginValid');
Route::get('/logoutvalid/','StudentsController@logoutValid');

Route::get('/getproducts/','ProductsController@getProducts');
Route::get('/addproducts/','ProductsController@addProducts');
Route::get('/deleteproducts/','ProductsController@deleteProducts');

Route::get('/gettravel/','TravelController@getTravel');
Route::get('/addtravel/','TravelController@addTravel');






