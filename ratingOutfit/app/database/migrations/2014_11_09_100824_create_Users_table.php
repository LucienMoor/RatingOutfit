<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('Users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('pseudo');
			$table->string('email');
			$table->string('picture');
			$table->integer('nbReport')->unsigned()->default('0');
			$table->date('birthdate')->nullable();
			$table->string('country')->nullable();
			$table->text('presentation')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Users');
	}
}