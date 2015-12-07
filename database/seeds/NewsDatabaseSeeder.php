<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class NewsDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('NewsModuleTableSeeder');
	}

}

class NewsModuleTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_modules')->insert(array(
			'name' => 'news',
			'title' => 'news',
			'unique' => true,
			'nature' => 'news',
			'lang_id' => null,
		));
	}
}
