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
            $event = Event::where('id', $subscription->event_id)->first();
            $url = Event::find($subscription->event_id)->urls()->where('subscription_id', $subscription->id)->get()->toArray();
            $urls['id'] = array_fetch($url,'id');
            $urls['callback_url'] = array_fetch($url,'callback_url');
            $eventInformation[] = [
            "subscriptionsId"       => $subscription->id ,
            "eventId"               => $subscription->event_id ,
            "active"                => $subscription->active ,
            "eventName"             => $event['name'],
            "eventDescription"      => $event['description'],
            "urls"                  => $urls 
            ];
        }   
        return View::make("pages.subscription",['eventInformation'=>$eventInformation]);
    }
    public function fire()
    {
        $event = Event::all();
        return View::make("pages.test",["Event"=>$event]);
    }

}
