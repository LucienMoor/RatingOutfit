<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Contacts', function(Blueprint $table) {
			$table->foreign('contact_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Contacts', function(Blueprint $table) {
			$table->foreign('user_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->foreign('user_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->foreign('gender_ID')->references('id')->on('Genders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->foreign('style_ID')->references('id')->on('Styles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ArticleComments', function(Blueprint $table) {
			$table->foreign('article_ID')->references('id')->on('Articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ArticleComments', function(Blueprint $table) {
			$table->foreign('user_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('UserComments', function(Blueprint $table) {
			$table->foreign('userDestinated_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('UserComments', function(Blueprint $table) {
			$table->foreign('userEditor_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Favorites', function(Blueprint $table) {
			$table->foreign('user_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Favorites', function(Blueprint $table) {
			$table->foreign('articles_ID')->references('id')->on('Articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Votes', function(Blueprint $table) {
			$table->foreign('user_ID')->references('id')->on('Users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Votes', function(Blueprint $table) {
			$table->foreign('articles_ID')->references('id')->on('Articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('Contacts', function(Blueprint $table) {
			$table->dropForeign('Contacts_contact_ID_foreign');
		});
		Schema::table('Contacts', function(Blueprint $table) {
			$table->dropForeign('Contacts_user_ID_foreign');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->dropForeign('Articles_user_ID_foreign');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->dropForeign('Articles_gender_ID_foreign');
		});
		Schema::table('Articles', function(Blueprint $table) {
			$table->dropForeign('Articles_style_ID_foreign');
		});
		Schema::table('ArticleComments', function(Blueprint $table) {
			$table->dropForeign('ArticleComments_article_ID_foreign');
		});
		Schema::table('ArticleComments', function(Blueprint $table) {
			$table->dropForeign('ArticleComments_user_ID_foreign');
		});
		Schema::table('UserComments', function(Blueprint $table) {
			$table->dropForeign('UserComments_userDestinated_ID_foreign');
		});
		Schema::table('UserComments', function(Blueprint $table) {
			$table->dropForeign('UserComments_userEditor_ID_foreign');
		});
		Schema::table('Favorites', function(Blueprint $table) {
			$table->dropForeign('Favorites_user_ID_foreign');
		});
		Schema::table('Favorites', function(Blueprint $table) {
			$table->dropForeign('Favorites_articles_ID_foreign');
		});
		Schema::table('Votes', function(Blueprint $table) {
			$table->dropForeign('Votes_user_ID_foreign');
		});
		Schema::table('Votes', function(Blueprint $table) {
			$table->dropForeign('Votes_articles_ID_foreign');
		});
	}
}