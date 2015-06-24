<?php
use Illuminate\Database\Migrations\Migration;

class Urls extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('urls', function($table)
		{
			$table->increments('id');
            $table->string('callback_url');
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
		Schema::drop('urls');
	}

}
