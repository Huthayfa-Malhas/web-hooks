<?php


use Illuminate\Database\Query\Builder;


use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;
class SubscriptionController extends \BaseController {

    
    public function index()
    {

        $Event = Event::all();
       // return View::make("index",["Event"=>$Event]);
    }


    public function eventActive()
    {

        return "test";

        $userId = 1;
        Subscription::where('event_id',Input::get('eventId'))->where('user_id',$userId)->update(['active'=>Input::get('active')]);
  //      return "Done";
    }

   


 public function delete()
    {
        $userId = 1;

        Webhooks\Models\Subscription::where('event_id',$id )->where('user_id', $userId)->delete();
    }

    
    


    
}
