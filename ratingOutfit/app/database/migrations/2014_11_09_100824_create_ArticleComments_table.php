<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleCommentsTable extends Migration {

	public function up()
	{
		Schema::create('ArticleComments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('article_ID')->unsigned();
			$table->integer('user_ID')->unsigned();
			$table->text('comment');
		});
	}

	public function down()
	{
		Schema::drop('ArticleComments');
	}
}