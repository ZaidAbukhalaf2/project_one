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
    Route::get('edit/{offer_id}','CloudController@editOffer');
    Route::post('update/{offer_id}','CloudController@updateOffer')->name('create.update');
    Route::post('delete/{offer_id}','CloudController@deleteOffer')->name('create.delete');;
    Route::get('all','CloudController@getAllOffer');


    });
});

Route::get('youtube','CloudController@getvideo');


#################### Start Ajax Routes #########



Route::group(['prefix' => 'ajax-offers'], function () {
    Route::get('create','OfferController@create');
    Route::post('store','OfferController@store')->name('ajax.offers.store');
    Route::get('all', 'OfferController@all')->name('ajax.offers.all');
    Route::post('delete','OfferController@delete')->name('ajax.offers.delete');
    Route::get('edit/{offer_id}','OfferController@edit')->name('ajax.offers.edit');
    Route::post('update', 'OfferController@Update')->name('ajax.offers.update');
});

############### End Ajax Routes ####################


####################### Start Middleware Routes ################

Route::group(['middleware'=>'CheckAge','namespace'=>'Auth'],function(){

    Route::get('adults','AgesController@adualt')->name('adult');


});




####################### End   Middleware Routes ################ 