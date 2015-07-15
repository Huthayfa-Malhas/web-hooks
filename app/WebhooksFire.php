<?php
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Event;
\Event::subscribe('WebhooksFire');

class WebhooksFire 
{
    public function subscribe()
    {

            Event::listen('prefix.*', function($events, $payload) {
            
                if (Event::firing() == 'prefix.'.$events['name'])
                 {
                    $callback_url = Webhooks\Models\Event::find($events['id'])->activeurls;

                    foreach ($callback_url as $value) 
                    {
                        $sent=array($payload,$value['callback_url']);
                        Queue::push('QeueHandler@posthooks',$sent);
                    }
                }
                
        });
    }
}
