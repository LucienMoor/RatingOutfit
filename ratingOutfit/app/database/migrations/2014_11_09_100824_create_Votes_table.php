<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotesTable extends Migration {

	public function up()
	{
		Schema::create('Votes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_ID')->unsigned();
			$table->integer('articles_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Votes');
	}
}