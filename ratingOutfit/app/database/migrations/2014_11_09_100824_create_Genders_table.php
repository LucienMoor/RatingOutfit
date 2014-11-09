<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGendersTable extends Migration {

	public function up()
	{
		Schema::create('Genders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('gender');
		});
	}

	public function down()
	{
		Schema::drop('Genders');
	}
}