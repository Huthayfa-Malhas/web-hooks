<?php 
class Link extends Eloquent {
	
	protected $table = 'links';
	protected $fillable = ['url'];

	public function users(){
		return $this->belongsToMany('User', 'case_user', 'link_id', 'user_id')->withTimestamps();

	}

	public function cases(){
		return $this->belongsToMany('Cases', 'case_user', 'link_id', 'case_id')->withTimestamps();
	}

}
