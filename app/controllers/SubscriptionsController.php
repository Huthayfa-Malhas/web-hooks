<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Url;

class SubscriptionsController extends \BaseController
{
    public function validateURl($url)
    {
        return preg_match("/\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url);
    }

    public function activate($id)
    {
        Subscription::find($id)->update(['active'=>Input::get('active')]);
    }

    public function subscribe()
    {   
        $userId = 1;
        $callBackUrl = Input::get('Url');
        $subscription = Subscription::create(['event_id'=>Input::get('eventID'), 'user_id'=>$userId]);
        foreach ($callBackUrl as $url) {
            if (validateURl($url)) 
                $Url = Url::create(["callback_url" => $url,"subscription_id" => $subscription->id]);
        }
        return "success";
    }

    public function update($id)
    {
        $userId = 1;
        $recivedUrls = Input::get('Urls');
        $eventUrl = Subscription::find($id)->urls()->lists('callback_url');
        $urlsToDelete = array_diff($eventUrl, $recivedUrls);
        $urlsToStore = array_unique(array_diff($recivedUrls, $eventUrl));
        foreach ($urlsToDelete as $url) {
            Url::where('subscription_id',$id )->where('callback_url',$url)->delete();
        }
        foreach ( $urlsToStore as $url) {
            if (validateURl($url)) 
                $Url = Url::create(["callback_url" => $url,"subscription_id" => $id]);
        }
        return 'success';
    }

     public function unsubscribe($id)
    {
        Subscription::find($id)->delete();
    }
}
