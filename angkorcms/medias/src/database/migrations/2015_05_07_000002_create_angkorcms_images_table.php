<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_images', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('path');
			$table->string('filename');
			$table->string('extension');
			$table->integer('folder_id')->unsigned()->nullable();
			$table->foreign('folder_id')->references('id')->on('angkorcms_folders')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->unique('filename', 'extension');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('angkorcms_images');
	}

}
