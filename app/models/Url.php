<?php namespace Webhooks\Models;

class Url extends \Eloquent {
    
    protected $table = 'urls';
    protected $fillable = ['callback_url'];

    public function users(){
        return $this->belongsToMany('\Webhooks\Models\User', 'webhooks', 'link_id', 'user_id')->withTimestamps();

    }

    public function events(){
        return $this->belongsToMany('\Webhooks\Models\Event', 'webhooks', 'link_id', 'event_id')->withTimestamps();
    }

}