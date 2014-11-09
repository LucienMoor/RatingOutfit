<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('Contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('contact_ID')->unsigned();
			$table->integer('user_ID')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Contacts');
	}
}