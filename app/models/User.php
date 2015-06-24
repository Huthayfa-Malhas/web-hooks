<?php namespace Webhooks\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements ConfideUserInterface
{
    protected $table = 'users';
    protected $fillable = ["username","email","password","confirmation_code","remember_token","confirmed"];

    public function urls()
    {
        return $this->belongsToMany('\Webhooks\Models\Url', 'webhooks', 'user_id', 'link_id')->withTimestamps();
    }

    public function events()
    {
        return $this->belongsToMany('Webhooks\Models\Event', 'webhooks', 'user_id', 'event_id')->withTimestamps();
    }

    use ConfideUser;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}
