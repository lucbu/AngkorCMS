<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngkorcmsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('angkorcms_comments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('content');
			$table->integer('user_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('post_id')->references('id')->on('angkorcms_posts')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('angkorcms_comments');
	}

}
