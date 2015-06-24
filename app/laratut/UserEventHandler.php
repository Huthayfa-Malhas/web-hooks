<?php
 namespace laratutHandlers;

class UserEventHandler {

// here is the listener
	public function subscribe($events)
	{
		$events->listen('user.login', 'laratutHandlers\UserEventHandler@onLogin');
		$events->listen('user.newsletter', 'laratutHandlers\UserEventHandler@onNewsletter');
		$events->listen('user.logout', 'laratutHandlers\UserEventHandler@onLogout');
	}
	
	// happens when the user logs in
	public function onLogin()
	{
		// event name
		// payload as param
		echo 'The user just logged in<br>';
	}
	
	// happens when the user signs up to the newsletter
	public function onNewsletter()
	{
		echo 'The user just signed up for your newsletter, nice work<br>';
	}
	
	//  happens when the user logs out
	public function onLogout()
	{
		echo 'The user just logged out<br>';
	}
}
