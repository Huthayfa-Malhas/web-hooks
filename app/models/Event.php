<?php namespace Webhooks\Models;
class Event extends \Eloquent {
	
	protected $table = 'events';
	protected $fillable = ['name'];
	
	public function users(){
		return $this->belongsToMany('User', 'webhooks', 'event_id', 'user_id')->withTimestamps();

	}

	public function links(){
		return $this->belongsToMany('Link', 'webhooks', 'event_id','link_id')->withTimestamps();
	
	}

}
