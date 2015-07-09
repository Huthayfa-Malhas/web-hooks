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

    public function update($id)
    {

        
        $eventurl=array();
        $subscrip=Webhooks\Models\Subscription::where('event_id',$id )->where('user_id',1 )->get();
        $subscripid=$subscrip[0]['id'];
     //   $subscripstatus=$subscrip[0]['active'];
        
        $urlobject=Webhooks\Models\Url::where('subscription_id',$subscripid )->get();
        $numofurls=count($urlobject);

for($i=0;$i<$numofurls;$i++) {

    $eventurl[$i]=$urlobject[$i]['callback_url'];
}

$recivedurls=array("www.yazeed.com"  , "www.url3.com", "www.qays4.com" );
$urlstosave = array_diff($recivedurls, $eventurl);
$urlstodelete=array_diff($eventurl, $recivedurls);
$resettedarraydel=array_values($urlstodelete);
$resettedarraysave=array_values($urlstosave);

for($i=0;$i<count($resettedarraydel);$i++)
{

Webhooks\Models\Url::where('subscription_id',$subscripid )->where('callback_url',$resettedarraydel[$i])->delete();
}
for($i=0;$i<count($resettedarraysave);$i++)
{
$Url = Url::create(["callback_url" => $resettedarraysave[$i],"subscription_id" => $subscripid]);
        
}


    }


 public function delete()
    {
        $userId = 1;

        Webhooks\Models\Subscription::where('event_id',$id )->where('user_id', $userId)->delete();
    }

    
    


    
}
