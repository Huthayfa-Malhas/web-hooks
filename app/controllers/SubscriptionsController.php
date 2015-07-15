<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class SubscriptionsController extends \BaseController
{

    public function activate($id)
    {
        Subscription::find($id)->update(['active'=>Input::get('active')]);
    }

    public function subscribe()
    {   
        $userId = 1;
        $callBackUrl = Input::get('Url');
        $subscription = Subscription::create(['event_id' => Input::get('eventID'), 'user_id' => $userId]);
        foreach ($callBackUrl as $url) {

            if (preg_match("/\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) 
                $Url = Url::create(["callback_url" => $url,"subscription_id" => $subscription->id]);
        }
        return "success";
    }

    public function update($id)
    { 
        $userId = 1;
        $recivedUrls = Input::get('Urls');
        $urlObject=Url::where('subscription_id',$id )->get()->toArray();
      
        $eventUrl= array_fetch($urlObject,'callback_url');
        $eventUrl = [];
        $subscrip = Subscription::where('event_id', $id)->where('user_id', $userId)->get();
        $subscriptionId = $subscrip[0]->id;
        $urlObject = Url::where('subscription_id',$subscriptionId )->get();
        foreach ($urlObject as $value) {
            array_push($eventUrl, $value['callback_url']);
        }

        $resettedArrayDelete = array_values(array_diff($eventUrl, $recivedUrls));
        $resettedArraySave = array_values(array_diff($recivedUrls, $eventUrl));
        foreach ($resettedArrayDelete as $value) {
            Url::where('subscription_id',$id )->where('callback_url',$value)->delete();
        }

        foreach ( $resettedArraySave as $value) {
            if (preg_match("/\b(?:(?:https?|ftp):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$value)) 
                $Url = Url::create(["callback_url" => $value,"subscription_id" => $id]);
        }
        return 'success';
    }

    public function unsubscribe($id)
    {
        Subscription::find($id)->delete();
    }
}
