<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngkorcmsTagsTable extends Migration {

    public function up()
	{
		Schema::create('angkorcms_tags', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('tag', 50)->unique();
			$table->string('tag_url', 60)->unique();
		});
	}

	public function down()
	{
		Schema::drop('angkorcms_tags');
	}
}
