<?php namespace Webhooks\Models;
class Event extends \Eloquent 
{    
    protected $fillable = ['name','description'];
    
    public function subscriptions()
    {
        return $this->hasMany('\Webhooks\Models\Subscription', 'event_id');
    }
    
    public function users()
    {
        return $this->hasManyThrough('\Webhooks\Models\User', '\Webhooks\Models\Subscription');
    }

    public function urls()
    {
        return $this->hasManyThrough('\Webhooks\Models\Url', '\Webhooks\Models\Subscription');
    }

    public function activeurls()
    {
        return $this->hasManyThrough('\Webhooks\Models\Url', '\Webhooks\Models\Subscription')->where('active',1);
    }
}
