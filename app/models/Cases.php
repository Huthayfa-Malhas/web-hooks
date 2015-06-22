<?php 
	class Cases extends Eloquent {
	
	protected $table = 'cases';
	protected $fillable = ['name'];
	
	public function users(){
		return $this->belongsToMany('User', 'case_user', 'case_id', 'user_id')->withTimestamps();

	}

	public function links(){
		return $this->belongsToMany('Link', 'case_user', 'case_id','link_id')->withTimestamps();
	
	}

}
