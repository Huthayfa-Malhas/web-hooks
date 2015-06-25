<?php 
class Link extends Eloquent {
	
	protected $table = 'links';
	protected $fillable = ['link'];

	public function users(){
		return $this->belongsToMany('User', 'case_user', 'link_id', 'user_id')->withTimestamps();

	}

	public function cases(){
		return $this->belongsToMany('Case1', 'case_user', 'link_id', 'case_id')->withTimestamps();
	}

}
