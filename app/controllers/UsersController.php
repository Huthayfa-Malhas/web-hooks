<?php

use Webhooks\Models\Event;
use Webhooks\Models\User;

class UsersController extends BaseController 
{

    public function subscriptions()
    {
        $userId = 1;
        $subscriptions = User::find($userId)->subscriptions;
        $subscriptionsInf = [];
        foreach ($subscriptions as $subscription) {
            $subscriptionsInf[] = [
            "subscriptionsId"       => $subscription->id ,
            "active"                => $subscription->active ,
            "event"                 => Event::find($subscription->event_id),
            "urls"                  => Event::find($subscription->event_id)->urls
            ];
        }   
        return View::make("pages.subscriptions",['subscriptionsInf'=>$subscriptionsInf]);
    }

}
