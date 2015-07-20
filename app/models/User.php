<?php namespace Webhooks\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use \Zizaco\Confide;

class User extends \Eloquent implements \Zizaco\Confide\ConfideUserInterface
{
    protected $fillable = ["username","email","password","confirmation_code","remember_token","confirmed"];
    protected $hidden = array('password', 'remember_token');

    public function subscriptions()
    {
        return $this->hasMany('\Webhooks\Models\Subscription','user_id');
    }

    public function urls()
    {
        return $this->hasManyThrough('\Webhooks\Models\Url', '\Webhooks\Models\Subscription');
    }    
    
    public function scopeEvents($query,$type)
    {
        $eventsId = \Webhooks\Models\Subscription::where('user_id', '=', $type )->lists('event_id');
        return \Webhooks\Models\Event::whereIn('id',$eventsId)->get();
    }
    
    use \Zizaco\Confide\ConfideUser;    
}
