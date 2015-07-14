<?php
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Event;
\Event::subscribe('WebhooksFire');

class WebhooksFire 
{
    public function subscribe()
    {
        Event::listen('prefix.*', function($events, $payload) {
            $eventsname = Webhooks\Models\Event::all();
            $callback_url = Webhooks\Models\Event::find($events[0]['id'])->activeurls;
            foreach ($eventsname as $event) {
                if (Event::firing() == 'prefix.'.$events[0]['name']) {
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
