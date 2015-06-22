<?php 

namespace App\Http\Controllers;
use App\Controllers\Controller;
use App\Requests;

class Sessioncontroller extends  Controller {


public function destroy()
{
	
	return \View::make('login');
}



public function create(){
	
	return \View::make('session');
}
}