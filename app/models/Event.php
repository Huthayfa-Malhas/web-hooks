<?php namespace Webhooks\Models;
class Event extends \Eloquent 
{    
    protected $fillable = ['name','description'];
    
    public function subscriptions()
    {
        return $this->hasMany('\Webhooks\Models\Subscription')->withTimestamps();
    }

}
