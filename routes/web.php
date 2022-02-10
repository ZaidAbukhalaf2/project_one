<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;

/*
| --------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {



//     return view('welcome');
// });

// Route::get('/test1', function () {
//     return 'welcome';
// });


// //Route parameters



// Route::get('/test3/{id?}', function () {
//     return 'welcome';
// });


// //Route name
// Route::get('/test2/{id}', function ($id) {
//     return $id;
// })->name('a');


// Route::resource('news', 'AdminController');

// Route::get('index', 'AdminController@getindex');


// Route::get('landing', function () {

//     return view('landing');
// });



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('',function(){

    return 'home';
});