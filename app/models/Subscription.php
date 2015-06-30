<?php namespace Webhooks\Models;
class Subscription extends \Eloquent 
{    
    protected $fillable = ['event_id','user_id','active'];
    
    public function urls()
    {
        return $this->hasMany('\Webhooks\Models\Url')->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany('\Webhooks\Models\User')->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany('\Webhooks\Models\Event')->withTimestamps();
    }
}
