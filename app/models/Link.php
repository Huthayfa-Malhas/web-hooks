<?php namespace Webhooks\Models;

class Link extends \Eloquent {
	
	protected $table = 'links';
	protected $fillable = ['link'];

	public function users(){
		return $this->belongsToMany('User', 'webhooks', 'link_id', 'user_id')->withTimestamps();

	}

	public function events(){
		return $this->belongsToMany('\Webhooks\Models\Event', 'webhooks', 'link_id', 'event_id')->withTimestamps();
	}

}
