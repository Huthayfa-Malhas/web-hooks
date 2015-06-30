<?php

use Webhooks\Models;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class SubscriptionController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $User_id = '1';
        $EventName = "";
        $Urls = "";
        
//      \Webhooks\Models\User::find(1)->events()->updateExistingPivot(7,["event_id" => 1, "Url_id" => 1]);
        $events = User::find(1)->events->toArray();
        //$urls = \Webhooks\Models\Event::find()
        return $events[0];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
