<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngkorcmsLangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('angkorcms_langs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code')->unique;
			$table->string('description');
			$table->integer('image_id')->unsigned()->nullable();
			$table->foreign('image_id')->references(Config::get('angkorcmsmultilanguages.image_id'))->on(Config::get('angkorcmsmultilanguages.image_table'))
                        ->onDelete('set null')
                        ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('angkorcms_langs');
	}

}
