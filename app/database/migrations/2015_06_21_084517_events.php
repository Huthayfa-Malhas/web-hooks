<?php
use Illuminate\Database\Migrations\Migration;

class Events extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */


	public function up()
	{
		Schema::create('events', function($table)
		{
			$table->increments('id');
			$table->string('name');
            $table->boolean('active')->default(true);
			$table->timestamps();
		});

		Schema::create('event_user',function($table){
			$table->increments('id');
			
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->boolean('active')->default(true);

			
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
		Schema::drop('event_user');
	}

}
