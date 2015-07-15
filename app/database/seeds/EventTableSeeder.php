<?php 

use Webhooks\Models\Event;

class EventTableSeeder extends Seeder
{
	public function run()
	{
        Event::create(["name"=>"New User","description"=>"Inform you when new user is added to the system"]);
        Event::create(["name"=>"New Hotel","description"=>"Informs with new added hotels on the systems"]);
        Event::create(["name"=>"Ranking Varitation ","description"=>"infroms the user with hotel ranking larg increase or decrease "]);
        Event::create(["name"=>"Hotel Payments","description"=>"Reminds the user with close dates of hotels contracts and thier payments "]);
        Event::create(["name"=>"Customer Services","description"=>"Notify the user that customer has not applied his reservation in specfic hotel "]);
        Event::create(["name"=>" New Locations","description"=>"add new location to the database"]);
        Event::create(["name"=>"New Booking","description"=>"new booking at Hotel add by customer"]);
	}
}

