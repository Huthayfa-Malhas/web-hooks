<?php 

use Webhooks\Models\Event;

class EventTableSeeder extends Seeder
{
	public function run()
	{
        Event::create(["name"=>"Create User","description"=>"Add new User"]);
        Event::create(["name"=>"Create Hotel","description"=>"Add new Hotel"]);
        Event::create(["name"=>"Hotel Ranking","description"=>"Hotel Ranking increase or decrease "]);
        Event::create(["name"=>"No Price","description"=>"No Hotel price show"]);
        Event::create(["name"=>"No Show","description"=>"The User doesn't coming to Hotel"]);
        Event::create(["name"=>"New Location","description"=>"add new location to the database"]);
        Event::create(["name"=>"New Booking","description"=>"new booking at Hotel add by customer"]);

	}
}

