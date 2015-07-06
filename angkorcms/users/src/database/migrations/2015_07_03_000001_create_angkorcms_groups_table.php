<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_groups', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('group_parent_id')->unsigned()->nullable()->default('null');
			$table->foreign('group_parent_id')->references('id')->on('angkorcms_groups')
			->onDelete('SET NULL')
			->onUpdate('SET NULL');
		});

		Schema::table('users', function ($table) {
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
		Schema::drop('angkorcms_groups');
	}

}
