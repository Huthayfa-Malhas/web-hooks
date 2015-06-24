<?php namespace Webhooks\Models;
class Event extends \Eloquent {
    
    protected $table = 'events';
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->belongsToMany('\Webhooks\Models\User', 'webhooks', 'event_id', 'user_id')->withTimestamps();

    }

    public function urls()
    {
        return $this->belongsToMany('\Webhooks\Models\Url', 'webhooks', 'event_id','link_id')->withTimestamps();
    }
}
