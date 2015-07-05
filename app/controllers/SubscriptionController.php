<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class SubscriptionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userId = 1;
        $Event = Event::all();
        return View::make("pages.subscribe",["Event"=>$Event]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function eventActive()
    {
        $userId = 1;
        Subscription::where('event_id',Input::get('eventId'))->where('user_id',$userId)->update(['active'=>Input::get('active')]);
  //      return "Done";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {   
        
        $userId = 1;
        $callBackUrl = Input::get('Url');
        $test = Subscription::where('event_id',Input::get('eventID'))->where('user_id',$userId)->get();
        return $test[0];
        $subscription = Subscription::create(['event_id'=>Input::get('eventID'), 'user_id'=>$userId]);
        for ($i=0; $i < sizeof($callBackUrl); $i++) { 
           $Url = Url::create(["callback_url" => $callBackUrl[$i],"subscription_id" => $subscription->id]);
        }

        return "Event add successfully";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function fireEent()
    {
        $eventId = Input::get('eventId');
        $payload = Input::get('payload');
        $url = Subscription::where('event_id',$eventId)->where('active',1)->get();
        for ($i = 0; $i < count($url); $i++ ) {
            $Urls = Url::where('subscription_id',$url[$i]['id'])->get();
            $callback_url = $Urls[$i]['callback_url']; 
            extract($_POST);
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $callback_url);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $payload);
            $result = curl_exec($ch);
            curl_close($ch);
        }
            
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEventDescription()
    {

        $description = Event::find(Input::get('id'));
        return $description['description'];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $User_id = '1';
        $EventName = "";
        $Urls = "";
        
//      \Webhooks\Models\User::find(1)->events()->updateExistingPivot(7,["event_id" => 1, "Url_id" => 1]);
        $events = User::find(1)->events->toArray();
        //$urls = \Webhooks\Models\Event::find()
        return $events[0];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function delete()
    {
        $userId = 1;
        Subscription::where('event_id',Input::get('eventId'))->where('user_id', $userId)->delete();
    }


}
