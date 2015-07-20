<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function()
{
    return View::make('pages.index');
});

/**********      SubscriptionsController      **********/
Route::group(['prefix'=>'subscriptions'], function()
{
    Route::post('subscribe','SubscriptionsController@subscribe');
    Route::post('active/{id}','SubscriptionsController@activate');
    Route::delete('unsubscribe/{id}','SubscriptionsController@unsubscribe');
    Route::put('/{id}','SubscriptionsController@update');
});

/**********      UsersController      **********/
Route::get('subscription','UsersController@subscriptions');

/**********      EventsController      **********/
Route::get('events','EventsController@index');
Route::get('subscriptions','EventsController@subscriptions');
