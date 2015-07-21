<?php
use Illuminate\Support\Facades\Event;
use Vinelab\Http\Client as HttpClient;

class QeueHandler 
{

	public function posthooks($job,$data)

  {
    $client = new HttpClient;
    $request = [
        'url' => $data['callback_url'],
        'params' => $data['payload'],
        'jason' => true
    ];


    $response = $client->post($request);
    $job->delete();
  }

}