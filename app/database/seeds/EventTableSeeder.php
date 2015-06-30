<?php 

use Webhooks\Models\Event;

class EventTableSeeder extends Seeder
{
	public function run()
	{
        Event::create(["name"=>"Create User"]);
        Event::create(["name"=>""]);
        Event::create(["name"=>"Hotel Ranking"]);
        Event::create(["name"=>"No Price"]);
        Event::create(["name"=>"No Show"]);
        Event::create(["name"=>"New Location"]);
        Event::create(["name"=>"New Booking"]);

	}
}

