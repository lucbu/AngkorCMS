<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsSlidesTable extends Migration {

	public function up() {
		Schema::create('angkorcms_slides', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->integer('position')->default(0);
			$table->string('url');
			$table->integer('slideshow_id')->unsigned();
			$table->foreign('slideshow_id')->references('id')->on('angkorcms_slideshows')
			->onDelete('cascade')
			->onUpdate('cascade');
			$table->integer('image_id')->unsigned();
			$table->foreign('image_id')->references(Config::get('angkorcmsslideshows.image_id'))->on(Config::get('angkorcmsslideshows.image_table'))
			->onDelete('cascade')
			->onUpdate('cascade');
		});
	}

	public function down() {
		Schema::drop('angkorcms_slides');
	}

}
