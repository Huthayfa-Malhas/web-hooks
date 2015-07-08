<?php namespace Webhooks\Models;
class Subscription extends \Eloquent 
{    
    protected $fillable = ['event_id','user_id','active'];
    
    public function urls()
    {
        return $this->hasMany('\Webhooks\Models\Url');
    }

    public function users()
    {
        return $this->belongsTo('\Webhooks\Models\User');
    }

    public function events()
    {
        return $this->belongsTo('\Webhooks\Models\Event');
    }

    public function scopeActive($query){
        return $query->where('active',1);
    }
}
