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
use Vinelab\Http\Client as HttpClient;
require './vendor/autoload.php';

Route::get('/test',function()
{
	return "test";
});
Route::get('/',function()
{
	$client = new HttpClient;
	$request = [
        'url' => 'http://requestb.in/xsx5xhxs',
        'params' => [
        	'Qays Dwekat'=>'11001872',
			'format' 	=> 'json',
			'topic'		=> 'order/created',
			'url'		=> 'http://myshop.example.com/notify_me'
        ],
        'json' => true
    ];

    $response = $client->post($request);

    // raw content
    $httpCode =  $response->info();
    return $httpCode;

	//   return View::make('pages.index');
});

/**********      SubscriptionsController      **********/
Route::post('subscribe','SubscriptionsController@subscribe');
Route::post('active/{id}','SubscriptionsController@activate');
Route::delete('Event/unsubscribe/{id}','SubscriptionsController@unsubscribe');
Route::put('Event/update/{id}/Urls','SubscriptionsController@update');
Route::post('fireEent','SubscriptionsController@simulate');

/**********      UsersController      **********/
Route::get('webhooks','UsersController@fire');
Route::get('subscription','UsersController@subscription');

/**********      EventsController      **********/
Route::get('Event/{id}/Urls','EventsController@urls');
Route::get('subscriptions','EventsController@subscriptions');
