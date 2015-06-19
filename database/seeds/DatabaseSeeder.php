<?php

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
		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->insert(array(
			'name' => 'admin',
			'email' => 'admin@angkorcms.com',
			'password' => Hash::make('password'),
			'admin' => 1,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s"),
		));
	}
}
