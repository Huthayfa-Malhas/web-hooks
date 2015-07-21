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

Route::post('handleevent/{eventname}/{payload}',['uses'=>'FireEvents@webhookfire'] );


<<<<<<< HEAD
Route::get('/',function()
{
	  return View::make('pages.index');
});

=======
>>>>>>> 9ec1550cee89810d355d28334cc2ae83b9a9b602
/**********      SubscriptionsController      **********/
Route::post('subscribe','SubscriptionsController@subscribe');
Route::post('active/{id}','SubscriptionsController@activate');
Route::delete('Event/unsubscribe/{id}','SubscriptionsController@unsubscribe');
Route::put('Event/update/{id}/Urls','SubscriptionsController@update');

/**********      UsersController      **********/
Route::get('webhooks','UsersController@fire');
Route::get('subscription','UsersController@subscriptions');

/**********      EventsController      **********/
Route::get('Event/{id}/Urls','EventsController@urls');
Route::get('subscriptions','EventsController@subscriptions');
