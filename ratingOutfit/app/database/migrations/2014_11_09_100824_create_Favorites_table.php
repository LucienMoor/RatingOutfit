<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoritesTable extends Migration {

	public function up()
	{
		Schema::create('Favorites', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_ID')->unsigned();
			$table->integer('articles_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Favorites');
	}
}