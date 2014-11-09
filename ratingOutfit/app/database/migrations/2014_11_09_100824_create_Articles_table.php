<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('Articles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->integer('user_ID')->unsigned();
			$table->integer('point');
			$table->integer('nbVote');
			$table->string('picture');
			$table->text('description')->nullable();
			$table->integer('gender_ID')->unsigned();
			$table->integer('style_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Articles');
	}
}