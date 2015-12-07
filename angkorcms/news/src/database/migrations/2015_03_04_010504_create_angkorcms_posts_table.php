<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_posts', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 80);
			$table->string('slug', 120);
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->integer('lang_id')->unsigned();
			$table->foreign('lang_id')->references('id')->on('angkorcms_langs')
			->onDelete('cascade')
			->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('angkorcms_posts');
	}

}
