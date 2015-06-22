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

Route::get('/', function()
{
	// here is where the events fire
	Event::fire('user.login');
	Event::fire('user.newsletter');
	Event::fire('user.logout');
});//

	Route::resource('sub', 'SubscriptionController');

Route::get('test',function(){
	
	 // \EventT::create(['name'=>'event1']);
	 // \Url::create(['url'=>'test.com']);

	//User::find(2)->cases()->attach(10);
	Cases::find(3)->links()->attach(9,['user_id'=>7]);
	Link::find(1)->cases()->attach(1);

	 return "done";
});

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
