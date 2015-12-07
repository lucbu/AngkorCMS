<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class MediasDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('FolderTableSeeder');
		$this->call('ImageTableSeeder');
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
