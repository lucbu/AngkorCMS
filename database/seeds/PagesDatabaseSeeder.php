<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PagesDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('TemplateTableSeeder');
		$this->call('ThemeTableSeeder');
		$this->call('BlockTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('PageTransTableSeeder');
	}

}

class TemplateTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_templates')->insert(array(
			'name' => 'Simple',
		));
		DB::table('angkorcms_templates')->insert(array(
			'name' => 'Blog',
		));
	}
}

class ThemeTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_themes')->insert(array(
			'name' => 'Light',
			'style' => 'test.css',
			'view' => 'test.blade.php',
			'script' => 'script.js',
			'template_id' => 1,
		));
		DB::table('angkorcms_themes')->insert(array(
			'name' => 'Base',
			'style' => 'freelancer.css',
			'view' => 'index.blade.php',
			'script' => 'freelancer.js',
			'template_id' => 2,
		));
	}
}

class BlockTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'body',
			'template_id' => 1,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'footer',
			'template_id' => 1,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'navbar',
			'template_id' => 1,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'navbar',
			'template_id' => 2,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'header',
			'template_id' => 2,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'footer',
			'template_id' => 2,
		));
		DB::table('angkorcms_blocks')->insert(array(
			'name' => 'body',
			'template_id' => 2,
		));
	}
}

class PageTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_pages')->insert(array(
			'name' => 'Index',
			'accessible' => 1,
			'theme_id' => 2,
		));
		DB::table('angkorcms_pages')->insert(array(
			'name' => 'Users',
			'accessible' => 1,
			'theme_id' => 2,
		));
		DB::table('angkorcms_pages')->insert(array(
			'name' => 'News',
			'accessible' => 1,
			'theme_id' => 2,
		));
	}
}

class PageTransTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'Index',
			'slug' => 'index',
			'page_id' => 1,
			'lang_id' => 1,
		));
		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'Users',
			'slug' => 'users',
			'page_id' => 2,
			'lang_id' => 1,
		));
		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'News',
			'slug' => 'news',
			'page_id' => 3,
			'lang_id' => 1,
		));

		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'Accueil',
			'slug' => 'accueil',
			'page_id' => 1,
			'lang_id' => 2,
		));
		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'Utilisateurs',
			'slug' => 'utilisateurs',
			'page_id' => 2,
			'lang_id' => 2,
		));
		DB::table('angkorcms_pages_trans')->insert(array(
			'title' => 'Actu',
			'slug' => 'actu',
			'page_id' => 3,
			'lang_id' => 2,
		));
	}
}
