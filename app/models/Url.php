<?php namespace Webhooks\Models;

class Url extends \Eloquent {
    
    protected $table = 'urls';
    protected $fillable = ['callback_url'];

    public function users()
    {
        return $this->belongsToMany('\Webhooks\Models\User', 'event_user', 'url_id', 'user_id')->withTimestamps();
    }

    public function events()
    {
        return $this->belongsToMany('\Webhooks\Models\Event', 'event_user', 'url_id', 'event_id')->withTimestamps();
    }

}