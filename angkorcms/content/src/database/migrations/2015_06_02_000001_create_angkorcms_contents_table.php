<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->text('content');
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
		Schema::drop('angkorcms_contents');
	}

}
