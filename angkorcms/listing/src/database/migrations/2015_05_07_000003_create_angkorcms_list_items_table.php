<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsListItemsTable extends Migration {

	public function up() {
		Schema::create('angkorcms_list_items', function (Blueprint $table) {
			$table->increments('id');
			$table->string('text');
			$table->integer('position')->default(0);
			$table->string('url');
			$table->integer('list_id')->unsigned();
			$table->foreign('list_id')->references('id')->on('angkorcms_lists')
			->onDelete('cascade')
			->onUpdate('cascade');
		});
	}

	public function down() {
		Schema::drop('angkorcms_list_items');
	}
}
