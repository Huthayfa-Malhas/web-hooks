<?php

class SubscriptionController extends \BaseController
{

	/**
	 * Display a listing of the resource.
	 *
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	//	\Cases::create(['name'=>'Event1']);
		\Link::create(['link' => 'test.net']);
		return "asd";
	/*
		$webhooks = new Webhooks;
        $webhooks->user_id  = 1;
        $webhooks->event = 'event.test';
        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $webhooks->url = 'www.test.com';
        // Generate a random confirmation code
        $webhooks->active = 1;
        // Save if valid. Password field will be hashed before save
        $webhooks->save();;
        return $webhooks;
        */
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "Show";
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
		//
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
