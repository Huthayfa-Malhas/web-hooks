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
			$i=0;
			$sentnames = array();
			$eventss = Webhooks\Models\User::find($id)->events->toArray();
			//$eventss= User::find($id)->cases;
			//dd($eventss );
			$numofevents=count($eventss);
			
			$eventurls = \Webhooks\Models\Event::find($eventss[0]["id"])->urls->toArray();



  //dd($eventurls);
		

//[{"id":5},{},{}]

for ($i=0; $i <$numofevents ; $i++) { 
	$sentnames[$i]=$eventss[$i]['name'];
}



//dd($sentnames);



//$i=1;
 //$sentdata = array();

	/*	foreach ($user->cases as $case)
		{
		$caseforuser= $case->pivot->case_id;
		$userevents  = Case1::find($caseforuser);
		
		$sentdata[$i]=$userevents['name'];

		//echo $userevents;
	//echo "<br>";
	$i++;
		}
*/
//return $sentnames;
//return View::make('session');
 return View::make('session')->with($sentnames);
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
