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

		$array1 = array("www.goole.com", "koora.com", "qais.cool", "qais.leader");
$array2 = array("www.google.com", "frra.com", "qais.cool");
$n = array_diff($array2, $array1);


		
	/*	$incomingname = "changed";
		$incomingurl= array("www.goole.com", "koora.com", "qais.cool", "qais.leader");
		$user= Webhooks\Models\User::find(1);
		$ev=  Webhooks\Models\Event::find($id);
		$myeve=$user->events->get($id);
		//dd($myeve);
		$x=$myeve['name'];
		//dd($x);
		foreach ($myeve->urls as $role)
		{
		   $n= $role->pivot->url_id;
		}
		// $y  =  $urlss->events->find($x);

	//dd($urlss['id']);
		
		/*   if (strcmp($myeve['name'],$incomingname) == 0) 
			  {
				$myeve->name=$myeve['name'];
			      }
			else
			{
				$myeve->name=$incomingname;
			    }

		
		//$numberofurls=count($urlsforevent);

		//$eventsforuser->name=$incomingname;
		//$eventsforuser->active=$incomingactive;

		for($i=0;$i<$numberofurls;$i++)
		{
			
            $eventsforuser->urls[$i]['callback_url']=$incomingurl[$i];

           

		}
		//dd($myurls);
		//$myurls->save();
		//$eventsforuser->save();

		//$savedev->save();*/
		return $n;
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
		$linkid= $event->links()->link_id;
		$link_id = \Webhooks\Models\Url::find($linkid);
	    $user->cases()->detach($event);
		$link_id->delete();
	    $event->delete();	
	}


    
}
