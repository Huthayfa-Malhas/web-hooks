<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventsController extends BaseController 
{
     public function index()
    {          
        $userId = 1;
        $subscriptions = User::find($userId)->subscriptions->toArray();
        $eventsId = array_fetch($subscriptions,'event_id');
        $Event = Event::whereNotIn('id', $eventsId)->get();
        return View::make("pages.subscribe",["Event"=>$Event]);
    }

    public function urls($id)
    {
        $Event = Event::find($id)->activeurls->toArray();
        $Urls = array_fetch($Event,'callback_url');
        return $Urls;
    }
}
