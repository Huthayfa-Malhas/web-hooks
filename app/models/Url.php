<?php namespace Webhooks\Models;

class Url extends \Eloquent {
    
    protected $table = 'urls';
    protected $fillable = ['callback_url','subscribe_id'];

}