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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students', 'StudentController');
Route::post('post{id}', 'CommentController@post')->name('postComment');
Route::get('addStudent', 'StudentController@create')->name('addStudent');
Route::post('outFollowUp{id}', 'StudentController@outFollowUp')->name('outFollowUp');
Route::post('inFollowUp{id}', 'StudentController@addIntoFollowUp')->name('inFollowUp');
Route::get('deleteComment{id}','CommentController@delete')->name('deleteComment');
Route::get('showEdit{id}','CommentController@showForm')->name('showEdit');
Route::put('updateComment{id}','CommentController@update')->name('updateComment');
