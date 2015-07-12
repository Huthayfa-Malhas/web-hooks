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

Route::get('handleevent/{eventname}/{payload}',['uses'=>'UserEventFire@webhookfire'] );
 


Route::get('/', function()
{
	
	return View::make('index');
});
Route::post('subscribe','UserController@storeevents');
Route::get('getEvent','UserController@getEvent');
Route::post('active','SubscriptionController@eventActive');
Route::post('delete','SubscriptionController@delete');
Route::post('testwebhook','EventController@testwebhook');







Route::get('d','\App\Controllers\SessionController@create');

	// here is where the events fire
//	Event::fire('user.login');
//	Event::fire('user.newsletter');
//	Event::fire('user.logout');
//});
	Route::resource('sub', 'SubscriptionController');




/**********      SubscriptionsController      **********/
Route::post('subscribe','SubscriptionsController@subscribe');
Route::post('active','SubscriptionsController@activate');
Route::delete('Event/unsubscribe/{id}','SubscriptionsController@unsubscribe');
Route::put('Event/update/{id}/Urls','SubscriptionsController@update');
Route::post('fireEent','SubscriptionsController@simulate');


/**********      EventsController      **********/
Route::get('Event/{id}/Urls','EventsController@urls');
Route::get('subscriptions','EventsController@index');
