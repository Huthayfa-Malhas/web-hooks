<?php
use Illuminate\Support\Facades\Event;

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

Route::get('handleevent/{eventname}/{payload}',['uses'=>'FireEvents@webhookfire'] );


Route::get('/',function()
{
    return View::make('pages.index');
});
Route::get('index2',function()
{
    return View::make('pages.index2');
});
/**********      SubscriptionsController      **********/
Route::post('subscribe','SubscriptionsController@subscribe');
Route::post('active','SubscriptionsController@activate');
Route::delete('Event/unsubscribe/{id}','SubscriptionsController@unsubscribe');
Route::put('Event/update/{id}/Urls','SubscriptionsController@update');
Route::post('fireEent','SubscriptionsController@simulate');
/**********      UsersController      **********/
Route::get('webhooks','UsersController@fire');
Route::get('subscription','UsersController@subscription');
/**********      EventsController      **********/
Route::get('Event/{id}/Urls','EventsController@urls');
Route::get('subscriptions','EventsController@index');