<?php
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Event;
\Event::subscribe('UserEventHandler');

class UserEventHandler 
{
    public function subscribe()
    {
        Event::listen('prefix.*', function($eventname, $eventid, $payload) {
            $eventsname = Webhooks\Models\Event::all();
         
            $eventinstance = new EventProcess();
            foreach ($eventsname as $event) {
                if (Event::firing() == 'prefix.'.$event['name']) {
                    $eventinstance->Queueprocess($event['id'],$payload);
                }
            }
        });
    }
}
