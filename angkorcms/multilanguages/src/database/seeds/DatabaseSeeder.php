<?php namespace AngkorCMS\MultiLanguages\Database\Seeds;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('AngkorCMS\MultiLanguages\Database\Seeds\LangTableSeeder');
		$this->call('AngkorCMS\MultiLanguages\Database\Seeds\ChangeLangModuleTableSeeder');
	}

}

class LangTableSeeder extends Seeder {
	public function run() {
		DB::table('angkorcms_langs')->insert(array(
			'code' => 'en',
			'description' => 'English',
			'image_id' => 1,
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
