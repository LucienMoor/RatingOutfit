<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPasswordUsers extends Migration {

	public function up()
	{
		Schema::table('Users', function($table) {
			$table->string('password');
		});
	}

	public function down()
	{
		Schema::table('Users', function($table) {
        $table->dropColumn('password');
    });
	}
}