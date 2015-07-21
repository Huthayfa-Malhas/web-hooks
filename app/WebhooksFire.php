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
            $callback_url = Webhooks\Models\Event::find($events->id)->activeurls;
            foreach ($eventsname as $event) {
                if (Event::firing() == 'prefix.'.$events->name) {
                    foreach ($callback_url as $value) 
                    {
                        Queue::push('QeueHandler@posthooks',["payload" =>$payload,"callback_url" => $value->callback_url]);
                    }
                }
            }  
        });
    }
}
