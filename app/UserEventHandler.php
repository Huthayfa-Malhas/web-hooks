<?php

use Barryvdh\Queue\AsyncQueue;
use Illuminate\Queue\SyncQueue;
use Symfony\Component\Process\Process;

use Illuminate\Support\Facades\Event;
\Event::subscribe('UserEventHandler');

use Webhooks\Models\Subscription;


use Webhooks\Models\Url;
use Webhooks\Models\User;

class UserEventHandler 
{
	// the action to take place
	public function subscribe()
	{
		Event::listen('prefix.*',function($eventname,$eventid,$payload){
			
			$eventsname=Webhooks\Models\Event::all();
			
			$eventinstance= new EventProcess();

			foreach ($eventsname as $event )
			{
				if (Event::firing() == 'prefix.'.$event['name'])
				{

					$eventinstance->Queueprocess($event['id'],$payload);
				}
				

			}


			
			

		});
	}
}
