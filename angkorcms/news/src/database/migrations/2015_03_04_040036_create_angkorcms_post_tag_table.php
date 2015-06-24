<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngkorcmsPostTagTable extends Migration {

    public function up()
	{
		Schema::create('angkorcms_post_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->foreign('post_id')->references('id')->on('angkorcms_posts')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('angkorcms_tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('angkorcms_post_tag');
	}
}
