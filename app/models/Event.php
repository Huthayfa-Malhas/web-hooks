<?php namespace Webhooks\Models;
class Event extends \Eloquent 
{    
    protected $fillable = ['name','description'];
    
    public function subscriptions()
    {
        return $this->hasMany('\Webhooks\Models\Subscription')->withTimestamps();
    }
    public function users()
    {
        return $this->hasManyThrough('\Webhooks\Models\User', '\Webhooks\Models\Subscription');
    }
    public function urls()
    {
        return $this->hasManyThrough('\Webhooks\Models\Url', '\Webhooks\Models\Subscription','active');
    }
}
