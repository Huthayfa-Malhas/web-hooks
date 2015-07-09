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
        $subscriptions = User::find($userId)->subscriptions;
        foreach ($subscriptions as $value) {
            $eventsId[] = $value->event_id;
         }
        $Event = Event::whereNotIn('id', $eventsId)->get();
        return View::make("pages.subscribe",["Event"=>$Event]);
    }

    public function urls()
    {
        $url = Subscription::active()->where('event_id',Input::get('eventId'))->get();
        foreach ($url as $key) {
           $Urls = Url::select('callback_url')->where('subscription_id',$key['id'])->get();
           foreach ($Urls as $value) {
               $callbackurl [] = $value['callback_url'].'<br>' ;
           }
        }
        if (empty($callbackurl))
            return '';
        else
            return $callbackurl;
    }
}