<?php namespace AngkorCMS\Medias\Database\Seeds;

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
		$this->call('AngkorCMS\Medias\Database\Seeds\FolderTableSeeder');
		$this->call('AngkorCMS\Medias\Database\Seeds\ImageTableSeeder');
	}

}

class FolderTableSeeder extends Seeder {
	public function run() {
		DB::table('angkorcms_folders')->insert(array(
			'name' => 'Flag',
		));
	}
}

class ImageTableSeeder extends Seeder {
	public function run() {
		DB::table('angkorcms_images')->insert(array(
			'name' => 'en.gif',
			'path' => 'uploads/images',
			'filename' => 'en',
			'extension' => 'gif',
			'folder_id' => 1,
		));
		DB::table('angkorcms_images')->insert(array(
			'name' => 'fr.gif',
			'path' => 'uploads/images',
			'filename' => 'fr',
			'extension' => 'gif',
			'folder_id' => 1,
		));
	}
}
