<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class UsersController extends BaseController 
{

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
