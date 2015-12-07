<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_modules', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->string('nature');
			$table->boolean('unique')->default(false);
			$table->integer('lang_id')->unsigned()->nullable();
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
		Schema::drop('angkorcms_modules');
	}

}
