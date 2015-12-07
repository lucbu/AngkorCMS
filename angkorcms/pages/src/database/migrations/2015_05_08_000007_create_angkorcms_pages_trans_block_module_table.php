<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsPagesTransBlockModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_pages_trans_blocks_modules', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('position');
			$table->integer('page_trans_block_id')->unsigned()->nullable();
			$table->foreign('page_trans_block_id')->references('id')->on('angkorcms_pages_trans_blocks')
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
		Schema::drop('angkorcms_pages_trans_module');
	}
}