<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsPagesTransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_pages_trans', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->integer('page_id')->unsigned();
			$table->foreign('page_id')->references('id')->on('angkorcms_pages')
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
		Schema::drop('angkorcms_pages_trans');
	}

}
