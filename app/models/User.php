<?php
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
	protected $table = 'users';

	public function links(){
		return $this->belongsToMany('Link', 'case_user', 'user_id', 'link_id')->withTimestamps();

	}

	public function cases(){		
		return $this->belongsToMany('Case1', 'case_user', 'user_id', 'case_id')->withTimestamps();
	}


    use ConfideUser;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
