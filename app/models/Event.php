<?php namespace Webhooks\Models;
class Event extends \Eloquent 
{    
    protected $fillable = ['name','description'];
    
    public function subscriptions()
    {
        return $this->hasMany('\Webhooks\Models\Subscription', 'event_id');
    }

    public function urls()
    {
        return $this->hasManyThrough('\Webhooks\Models\Url', '\Webhooks\Models\Subscription');
    }

    public function activeurls()
    {
        return $this->urls()->where('active',1);
    }
}
