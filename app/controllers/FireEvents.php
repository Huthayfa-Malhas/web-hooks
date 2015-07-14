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
		$event = Webhooks\Models\Event::where('name',$eventname)->get();
		
		
		if (is_null ( @$event[0]['id'] ))
		{
			$returnData = array(
				'status' => 'error',
				'message' => 'Not Valid Event');
			return Response::json($returnData, 500);
		}
		
		Event::fire('prefix.'.$eventname,array($event,$payload));
	}

    


}