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
            $table->integer('subscribe_id')->unsigned();
            $table->foreign('subscribe_id')->references('id')->on('event_user')->onDelete('cascade');
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