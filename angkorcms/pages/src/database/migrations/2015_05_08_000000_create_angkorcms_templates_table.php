<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAngkorcmsTemplatesTable extends Migration {

	public function up() {
		Schema::create('angkorcms_templates', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
		});
	}

	public function down() {
		Schema::drop('angkorcms_templates');
	}
}
