<?php


use Illuminate\Database\Query\Builder;
use Webhooks\Models;

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventController extends \BaseController {


  public function index()
    {

        $Event = Event::all();
        return View::make("index",["Event"=>$Event]);
    }



 public function testwebhook()
    {
    	//dd(Event::fire('user.registered', [$name]));
    	dd('x');
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
    


}