<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsPagesTransBlockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_pages_trans_blocks', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('block_id')->unsigned()->nullable();
			$table->foreign('block_id')->references('id')->on('angkorcms_blocks')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->integer('page_trans_id')->unsigned();
			$table->foreign('page_trans_id')->references('id')->on('angkorcms_pages_trans')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->unique(array('block_id', 'page_trans_id'));
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