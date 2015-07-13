<?php
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Event;
\Event::subscribe('WebhooksFire');

class WebhooksFire 
{
    public function subscribe()
    {
        Event::listen('prefix.*', function($eventname, $eventid, $payload) {
            $eventsname = Webhooks\Models\Event::all();
            $callback_url = Webhooks\Models\Event::find($eventid)->activeurls;
            foreach ($eventsname as $event) {
                if (Event::firing() == 'prefix.'.$event['name']) {
                    foreach ($callback_url as $value) 
                    {
                        $sent=array($payload,$value['callback_url']);
                        Queue::push('QeueHandler@posthooks',$sent);
                    }
                }
            }
        });
    }
}
