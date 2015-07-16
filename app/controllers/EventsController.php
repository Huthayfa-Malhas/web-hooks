<?php

use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventsController extends BaseController 
{
     public function subscriptions()
    {          
        $userId = 1;
        $eventsId = User::find($userId)->subscriptions->lists('event_id');
        $events = Event::whereNotIn('id', $eventsId)->get()->toArray();
        return View::make("pages.subscribe",["Event"=>$events]);
    }

    public function urls($id)
    {
        return Event::find($id)->activeurls->lists('callback_url');
    }
}
