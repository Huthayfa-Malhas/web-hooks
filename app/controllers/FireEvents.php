<?php
use Illuminate\Support\Facades\Event;
use Webhooks\Models\Subscription;
use Webhooks\Models\Url;
use Webhooks\Models\User;
use Symfony\Component\Process\Process;


class FireEvents extends \BaseController 
{
	public static function  webhookfire ($eventname,$payload)
	{
		$eveid = Webhooks\Models\Event::where('name',$eventname)->get();
		@$eventid=$eveid[0]['id'];
		
		if (is_null ( @$eventid ))
		{
			$returnData = array(
				'status' => 'error',
				'message' => 'Not Valid Event');
			return Response::json($returnData, 500);
		}
		
		Event::fire('prefix.'.$eventname,array($eventname,$eventid,$payload));
	}

    


}