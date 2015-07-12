<?php
use Illuminate\Support\Facades\Event;
use Webhooks\Models\Subscription;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventProcess 
{


	public function Queueprocess ($eventid,$payload)
	{

		$callback_url = Webhooks\Models\Event::find($eventid)->activeurls;

		foreach ($callback_url as $value) 
		{
			$sent=array($payload,$value['callback_url']);
			
			Queue::push('QeueHandler@posthooks',$sent);
		}

	}

}
