<?php 

class SessionController extends  \BaseController
{

public function index(){
	return \View::make('session');
}

public function login()
{
	
	return \View::make('login');
}

public function create(){
	
	return \View::make('session');
}
}