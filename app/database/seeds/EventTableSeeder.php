<?php 

use Webhooks\Models\Event;

class EventTableSeeder extends Seeder
{
	public function run()
	{
        Event::create(["name"=>"Create User","code"=>"User.Create","description"=>"Add new User"]);
        Event::create(["name"=>"Create Hotel","code"=>"Hotel.Create","description"=>"Add new Hotel"]);
        Event::create(["name"=>"Hotel Ranking","code"=>"Rank.Hotel","description"=>"Hotel Ranking increase or decrease "]);
        Event::create(["name"=>"No Price","code"=>"","description"=>"No Hotel price show"]);
        Event::create(["name"=>"No Show","code"=>"","description"=>"The User doesn't coming to Hotel"]);
        Event::create(["name"=>"New Location","code"=>"Location.New","description"=>"add new location to the database"]);
        Event::create(["name"=>"New Booking","code"=>"Book.New","description"=>"new booking at Hotel add by customer"]);
	}
}

