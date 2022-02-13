<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Illuminte\Support\Facades\LaravelLocalization;


Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('',function(){

    return 'home';
});

Route::get('/redirect/{service}','SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');


Route::get('fillable','CloudController@getOffers');
// LaravelLocalization
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], 
function(){
    
Route::group(['prefix'=>'Offers'],function(){

    // Route::get('store','CloudController@store');

    Route::get('create','CloudController@create');
    Route::post('store','CloudController@store')->name('create.store');

    });
});