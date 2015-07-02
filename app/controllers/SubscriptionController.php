<?php

use Illuminate\Database\Query\Builder;
use Webhooks\Models;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;
use Webhooks\Models\Subscription;
class SubscriptionController extends \BaseController {

    /**
     * Display a listing of the resource.
     
     * @return Response
     */
    public function index()
    {
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return "test";
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public  function show($id)
    {
            
        $sentnames = array();
        $eventss = Webhooks\Models\User::find($id)->events->all();
            

          return View::make('session',array('sentnames' => $eventss));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


public function changestate($id)
{
   Subscription::where('event_id',$id )->where('user_id',1 )->update(array('active'=> Input::get('active')));
}
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        
        $eventurl=array();
        $subscrip=Webhooks\Models\Subscription::where('event_id',$id )->where('user_id',1 )->get();
        $subscripid=$subscrip[0]['id'];
     //   $subscripstatus=$subscrip[0]['active'];
        
        $urlobject=Webhooks\Models\Url::where('subscription_id',$subscripid )->get();
        $numofurls=count($urlobject);

for($i=0;$i<$numofurls;$i++) {

    $eventurl[$i]=$urlobject[$i]['callback_url'];
}

$recivedurls=array("www.yazeed.com"  , "www.url3.com", "www.qays4.com" );
$urlstosave = array_diff($recivedurls, $eventurl);
$urlstodelete=array_diff($eventurl, $recivedurls);
$resettedarraydel=array_values($urlstodelete);
$resettedarraysave=array_values($urlstosave);

for($i=0;$i<count($resettedarraydel);$i++)
{

Webhooks\Models\Url::where('subscription_id',$subscripid )->where('callback_url',$resettedarraydel[$i])->delete();
}
for($i=0;$i<count($resettedarraysave);$i++)
{
$Url = Url::create(["callback_url" => $resettedarraysave[$i],"subscription_id" => $subscripid]);
        
}

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $userId = 1;
        Webhooks\Models\Subscription::where('event_id',$id )->where('user_id', $userId)->delete();
    }

    public function getevent()
    {

$x=array();
$x1=array();
$usereve = Webhooks\Models\Subscription::where('user_id',1)->get();
$numofeveforuser=count($usereve );

 for($i=0;$i<$numofeveforuser;$i++)
 {
$x1[$i]=Event::find($usereve[$i]['event_id']);
$theuserevents[$i]=$x1[$i]['name'];
 }
return $theuserevents;
    }


    

    public function store()
    {   
        
        $userId = 1;
        $eventId = 1;
        $callBackUrl = ['0' => "www.google.com", '1' => "www.facebook.com", '2' => "www.instagram.com" , '3' => "www.yamsafer.com" ];
        
        $Pivot = User::find($userId)->events()->attach($eventId);
        
        $subscribeId = User::find(1)->events()->orderBy('id')->get()[0]['pivot']['id'];
        
        for ($i=0; $i < sizeof($callBackUrl); $i++) { 
            $Url = Url::create(["callback_url" => $callBackUrl[$i],"subscribe_id" => $subscribeId]);
        }
        return "Event add successfully";
    }


    
}
