<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStylesTable extends Migration {

	public function up()
	{
		Schema::create('Styles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('style');
		});
	}

	public function down()
	{
		Schema::drop('Styles');
	}
}