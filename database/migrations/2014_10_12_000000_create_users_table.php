<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 30)->unique();
			$table->string('email', 100)->unique();
			$table->string('password', 64);
			$table->boolean('admin')->default(false);
			$table->string('remember_token', 100)->nullable();
			$table->integer('group_id')->unsigned()->nullable();
			$table->foreign('group_id')->references('id')->on('angkorcms_groups')
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
		Schema::drop('users');
	}

}
