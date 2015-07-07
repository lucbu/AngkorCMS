<?php namespace -namespace-\Database\Seeds;

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
		$this->call('-namespace-\Database\Seeds\ModuleTableSeeder');
	}

}

class ModuleTableSeeder extends Seeder {

	public function run() {
		DB::table('')->insert(array(
		));
	}
}