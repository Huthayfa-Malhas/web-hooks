<?php
use Illuminate\Database\Query\Builder;

class SubscriptionController extends \BaseController {

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
			/*$test = $eventss->urls->all();
			for($i=0 ; $i<sizeof($test) ; $i++){
				$map = $test[$i];
			}
$d=json_decode([$id ], [$map]);
dd($d);

			$result = array();*/

			//$numofevents=count($eventss);


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


		$user= User::find(2);
		
		$event = \Webhooks\Models\Url::find($id);

	//DB::select('select `link_id` from case_user where `case_id` = 3 and `user_id` = 2')->delete();
		//dd($linkid);

		//foreach ($event->links as $link)
		//{
		$linkid= $event->links()->link_id;
		//}
		$link_id = \Webhooks\Models\Url::find($linkid);

	    $user->cases()->detach($event);
		$link_id->delete();
	    $event->delete();

		
		
		
	}


}
