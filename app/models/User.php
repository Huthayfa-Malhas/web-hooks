<?php namespace Webhooks\Models;
use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;


class User extends \Eloquent implements ConfideUserInterface
{
	protected $table = 'users';
	protected $fillable = ["username","email","password","confirmation_code","remember_token","confirmed"];

	public function urls(){
		return $this->belongsToMany('\Webhooks\Models\Url', 'webhooks', 'user_id', 'link_id')->withTimestamps();
	}

	public function events(){		
		return $this->belongsToMany('Webhooks\Models\Event', 'webhooks', 'user_id', 'event_id')->withTimestamps();
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
