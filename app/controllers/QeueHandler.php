<?php
use Illuminate\Support\Facades\Event;
use Webhooks\Models\Subscription;
use Webhooks\Models\Url;
use Webhooks\Models\User;
class QeueHandler 
{

	public function posthooks($job,$data)
    
    {

       extract($_POST);
       $ch = curl_init();
       curl_setopt($ch,CURLOPT_URL, $data[1]);
       curl_setopt($ch,CURLOPT_POSTFIELDS, $data[0]);
       $result = curl_exec($ch);
       curl_close($ch);
       $job->delete(); 
   }

}