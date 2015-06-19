<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsMapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('angkorcms_maps', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('zoom')->unsigned();
			$table->float('lat', 13, 8)->unsigned();
			$table->float('lng', 13, 8)->unsigned();
			$table->float('latMarker', 13, 8);
			$table->float('lngMarker', 13, 8);
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
		Schema::drop('angkorcms_maps');
	}

}
