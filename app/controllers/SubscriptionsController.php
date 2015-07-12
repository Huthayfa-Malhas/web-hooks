<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class SubscriptionsController extends \BaseController
{

    public function activate()
    {
        $userId = 1;
        Subscription::where('event_id',Input::get('eventId'))->where('user_id',$userId)->update(['active'=>Input::get('active')]);
    }

    public function subscribe()
    {   
        $userId = 1;
        $callBackUrl = Input::get('Url');
        $subscription = Subscription::create(['event_id'=>Input::get('eventID'), 'user_id'=>$userId]);
        foreach ($callBackUrl as $url) {
        //    if (!preg_match("/\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) 
            $Url = Url::create(["callback_url" => $url,"subscription_id" => $subscription->id]);
        }
        return "Event add successfully";
    }

    public function simulate()
    {
        $eventId = Input::get('eventId');
        $payload = Input::get('payload');
        $subscriptionsUrl = Subscription::where('event_id',$eventId)->where('active',1)->get();
        foreach ($subscriptionsUrl as $url ) {
            $urls = Url::where('subscription_id',$subscriptionsUrl['id'])->get();
            $callbackUrl = $urls['callback_url']; 
            extract($_POST);
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $callbackUrl);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $payload);
            $result = curl_exec($ch);
            curl_close($ch);
        }
    }

    public function update()
    {
        $userId = 1;
        $subscrip=Subscription::where('event_id',$eventId )->where('user_id',$userId )->get();
        $subscriptionId=$subscrip[0]['id'];
        $urlObject=Url::where('subscription_id',$subscriptionId )->get();
        foreach ($urlObject as $value) {
            $eventUrl=$value['callback_url'];
        }
        $recivedUrls=Input::get('Urls');
        $resettedArrayDelete=array_values(array_diff($eventUrl, $recivedUrls));
        $resettedArraySave=array_values(array_diff($recivedUrls, $eventUrl));
        foreach ($resettedArrayDelete as $value) {
            Url::where('subscription_id',$subscriptionId )->where('callback_url',$value)->delete();
        }
        foreach ( $resettedArraySave as $value) {
            $Url = Url::create(["callback_url" => $value,"subscription_id" => $subscriptionId]);
        }
    }

    public function unsubscribe()
    {
        $userId = 1;
        Subscription::where('event_id',Input::get('eventId'))->where('user_id', $userId)->delete();
    }
}
