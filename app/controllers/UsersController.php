<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class UsersController extends BaseController 
{

    public function subscriptions()
    {
        $userId = 1;
        $subscriptions = User::find($userId)->subscriptions;
        $eventInformation = [];
        foreach ($subscriptions as $subscription) {
            $event = Event::find($subscription->event_id);
            $url = Event::find($subscription->event_id)->urls;
            $eventInformation[] = [
            "subscriptionsId"       => $subscription->id ,
            "active"                => $subscription->active ,
            "event"                 => $event,
            "urls"                  => $url
            ];
        }   
        return View::make("pages.subscriptions",['eventInformation'=>$eventInformation]);
    }
    public function simulate()
    {
        $event = Event::all();
        return View::make("pages.test",["Event"=>$event]);
    }

}
