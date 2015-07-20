<?php
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Event;
\Event::subscribe('WebhooksFire');

class WebhooksFire 
{
    public function subscribe()
    {

            Event::listen('Yamsafer.*', function($events, $payload) {
            
                if (Event::firing() == 'Yamsafer.'.$events['name'])
                 {
                    $callbackurl = Webhooks\Models\Event::find($events['id'])->activeurls;

                    foreach ($callbackurl as $url) 
                    {
                        $sent=array($payload,$url['callback_url']);
                        Queue::push('HookJobs@posthooks',$sent);
                    }
                }
                
        });
    }
}
