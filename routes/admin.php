<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

// Route::get('/admin', function () {
//     return 'hellow admin';
// });

// //All Route Only Access Controller Or Method In Folder Name Admin
// Route::group(['namespace' => 'Admin'], function () {

//     Route::get('users', 'UserController@showString0');
//     Route::get('users1', 'UserController@showString1');
//     Route::get('users2', 'UserController@showString2');
//     Route::get('users3', 'UserController@showString3');
// });

// Route::get('login', function () {

//     return 'Must Be login To access This Route';
// })->name('login');


// Route::group(['prefix' => 'users'], function () {

//     Route::get('/', function () {

//         return 'work';
//     });


//     Route::get('show', 'UserController@showUserName');
//     Route::delete('delete', 'UserController@showUserName');
//     Route::get('edit', 'UserController@showUserName');
//     Route::put('update', 'UserController@showUserName');
// });
