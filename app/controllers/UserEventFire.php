<?php

use Illuminate\Support\Facades\Event;

use Webhooks\Models\Subscription;

use Webhooks\Models\Url;
use Webhooks\Models\User;

class UserEventFire extends \BaseController 
{

	public function webhookfire ($eventname)
	{
		$eveid = Webhooks\Models\Event::where('name',$eventname)->get();
		$eventcode=$eveid[0]['code'];
	
		@$eventid=$eveid[0]['id'];
		if (is_null ( @$eventid ))
		{
			dd('please enter other event');
		}

		Event::fire($eventcode,array($eventname,$eventid));

	}
}