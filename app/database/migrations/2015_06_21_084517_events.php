<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class events extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::create('webhooks',function(Blueprint $table){
			$table->increments('id');
			
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('link_id')->unsigned();
			$table->foreign('link_id')->references('id')->on('links');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
		Schema::drop('webhooks');
	}

}
