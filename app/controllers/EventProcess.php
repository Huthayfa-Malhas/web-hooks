<?php
use Illuminate\Support\Facades\Event;
use Webhooks\Models\Subscription;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventProcess 
{


public function Queueprocess ($eventid)
{

$callback_url = Webhooks\Models\Event::find($eventid)->activeurls;


$payload1= json_decode("{'a':1,'b':2,'c':3,'d':4,'e':5}");
foreach ($callback_url as $value) 
   {
	 $sent=array($payload1,$value['callback_url']);
	 
	 Queue::push('QeueHandler@posthooks',$sent);
    }

   }

}
