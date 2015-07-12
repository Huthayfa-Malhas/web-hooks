<?php


use Illuminate\Database\Query\Builder;
use Webhooks\Models;

use Webhooks\Models\Subscription;
use Webhooks\Models\Event;
use Webhooks\Models\Url;
use Webhooks\Models\User;

class EventController extends \BaseController {


  public function index()
    {

        $Event = Event::all();
        return View::make("index",["Event"=>$Event]);
    }




            
    }
    


}