<?php

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getEvent()
	{

		$userId = 1;
        $events = Subscription::where('user_id', $userId);
        for ($i=0 ; $i < count($events->get()); $i++ ){
    	    $eventId = $events->get()[$i]['event_id'];
    	    $id =$events->get()[$i]['id'];
       		$Event[$i] = Event::where('id', $eventId)->get();
       		$Url[$i] = Url::where('subscription_id', $id)->get();
        }
        return View::make("index",['Event'=> Event::all(),'Eventname'=>$Event,'Events'=>$events->get(),'Url'=>$Url]);

	}


	public function storeevents()
    {   
        $userId = 1;
        $callBackUrl = Input::get('Url');
        $subscription = Subscription::create(['event_id'=>Input::get('eventID'), 'user_id'=>$userId]);
        for ($i=0; $i < sizeof($callBackUrl); $i++) { 
           $Url = Url::create(["callback_url" => $callBackUrl[$i],"subscription_id" => $subscription->id]);
        }

        return "Event add successfully";

    }
        

        

    }




