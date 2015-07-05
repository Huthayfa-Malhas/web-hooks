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
Route::get('index',function()
{
	return View::make('pages.index');
});


Route::post('subscribe','SubscriptionController@store');
Route::get('getEvent','UserController@getEvent');
Route::post('active','SubscriptionController@eventActive');
Route::post('delete','SubscriptionController@delete');
Route::post('fireEent','SubscriptionController@fireEent');
Route::get('subscribe','SubscriptionController@index');
Route::get('subscription','UserController@subscription');
Route::get('webhooks','UserController@fire');
Route::post('getDescription','SubscriptionController@getEventDescription');





