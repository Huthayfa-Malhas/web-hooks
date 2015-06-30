<?php namespace Webhooks\Models;

class Url extends \Eloquent {
    
    protected $fillable = ['callback_url','subscription_id'];

    public function subscription()
    {
        return $this->belongsTo('\Webhooks\Models\Subscription')->withTimestamps();

    }
}