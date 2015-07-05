<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function subscription()
	{

		$userId = 1;
        $subscriptions = User::find(1)->subscriptions;
        foreach ($subscriptions as $subscription) {
       		$event[] = Event::where('id', $subscription->event_id)->get();
       		$url[] = Url::where('subscription_id', $subscription->id)->get();
        }
    	
        return View::make("pages.subscription",['Eventname'=>$event,'Events'=>$subscriptions,'Url'=>$url]);

	}
	public function fire()
	{
		$event = Event::all();
        return View::make("pages.test",["Event"=>$event]);	
	}

}
