<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCommentsTable extends Migration {

	public function up()
	{
		Schema::create('UserComments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('userDestinated_ID')->unsigned();
			$table->integer('userEditor_ID')->unsigned();
			$table->text('comment');
		});
	}

	public function down()
	{
		Schema::drop('UserComments');
	}
}