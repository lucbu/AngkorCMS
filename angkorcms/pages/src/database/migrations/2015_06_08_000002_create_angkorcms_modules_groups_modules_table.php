<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsModulesGroupsModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_modules_groupsmodules', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('position');
			$table->integer('groupmodule_id')->unsigned();
			$table->foreign('groupmodule_id')->references('id')->on('angkorcms_groupsmodules')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->integer('module_id')->unsigned();
			$table->foreign('module_id')->references('id')->on('angkorcms_modules')
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
		Schema::drop('angkorcms_modules_groupsmodules');
	}
}