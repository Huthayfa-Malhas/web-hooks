<?php namespace Webhooks\Models;
class Event extends \Eloquent 
{
    
    protected $table = 'events';
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->belongsToMany('\Webhooks\Models\User', 'event_user', 'event_id', 'user_id')->withTimestamps()->withPivot('id');

    }

}
