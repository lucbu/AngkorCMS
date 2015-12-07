<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_blocks', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('template_id')->unsigned();
			$table->foreign('template_id')->references('id')->on('angkorcms_templates')
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
		Schema::drop('angkorcms_blocks');
	}
}
