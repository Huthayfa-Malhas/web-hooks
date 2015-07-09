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
//$x='test';
Route::get('handleevent/{eventname}',['uses'=>'UserEventFire@webhookfire'] );
 
	// here is where the event fires

	//Event::fire('test');

	//dd("ss");


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




// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
Route::resource('unsub', 'SubscriptionController@destroy');
Route::resource('getall', 'SubscriptionController@show');
Route::resource('update', 'SubscriptionController@update');
Route::resource('geteve', 'SubscriptionController@getevent');

Route::get('testque', function() {
	
});