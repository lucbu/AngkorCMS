<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsPagesTable extends Migration {

	public function up() {
		Schema::create('angkorcms_pages', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->boolean('accessible')->default(false);
			$table->integer('theme_id')->unsigned()->nullable();
			$table->foreign('theme_id')->references('id')->on('angkorcms_themes')
			->onDelete('set null')
			->onUpdate('cascade');
		});
	}

	public function down() {
		Schema::drop('angkorcms_pages');
	}
}
