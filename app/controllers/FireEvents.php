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
		$event = Webhooks\Models\Event::where('name',$eventname)->first();
		
		if (is_null ( @$event->id ))
		{
			$returnData = array(
				'status' => 'error',
				'message' => 'Not Valid Event');
			return Response::json($returnData, 500);
		}
		
		Event::fire('prefix.'.$eventname,array($event,$payload));
	}

    


}