<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsFoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_folders', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('folder_parent_id')->unsigned()->nullable();
		});
		Schema::table('angkorcms_folders', function ($table) {
			$table->foreign('folder_parent_id')->references('id')->on('angkorcms_folders')
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
		Schema::drop('angkorcms_folders');
	}

}
