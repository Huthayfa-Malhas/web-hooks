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
Route::post('subscribe','SubscriptionsController@subscribe');
Route::post('active','SubscriptionsController@activate');
Route::post('unsubscribe','SubscriptionsController@unsubscribe');
Route::post('update','SubscriptionsController@update');
Route::post('fireEent','SubscriptionsController@simulate');

/**********      UsersController      **********/
Route::get('webhooks','UsersController@fire');
Route::get('subscription','UsersController@subscription');

/**********      EventsController      **********/
Route::get('getUrls','EventsController@urls');
Route::get('subscriptions','EventsController@index');
