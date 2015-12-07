<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class LangsDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('LangTableSeeder');
		$this->call('ChangeLangModuleTableSeeder');
	}

}

class LangTableSeeder extends Seeder {
	public function run() {
		DB::table('angkorcms_langs')->insert(array(
			'code' => 'en',
			'description' => 'English',
			'image_id' => 1,
		));
		DB::table('angkorcms_langs')->insert(array(
			'code' => 'fr',
			'description' => 'Francais',
			'image_id' => 2,
		));
	}
}

class ChangeLangModuleTableSeeder extends Seeder {
	public function run() {
		DB::table('angkorcms_modules')->insert(array(
			'name' => 'Change Lang',
			'title' => '',
			'unique' => true,
			'nature' => 'changelang',
			'lang_id' => null,
		));
	}
}
