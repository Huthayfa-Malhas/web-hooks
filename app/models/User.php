<?php namespace Webhooks\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use \Zizaco\Confide;

class User extends \Eloquent implements \Zizaco\Confide\ConfideUserInterface
{
    protected $table = 'users';
    protected $fillable = ["username","email","password","confirmation_code","remember_token","confirmed"];

    public function events()
    {
        return $this->belongsToMany('Webhooks\Models\Event', 'event_user', 'user_id', 'event_id')->withTimestamps()->withPivot('id');
    }

   use \Zizaco\Confide\ConfideUser;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
}
