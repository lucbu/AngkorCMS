<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();
		$this->call('UserTableSeeder');
		$this->call('LoginModuleTableSeeder');
		$this->call('ProfileModuleTableSeeder');
	}

}

class LoginModuleTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_modules')->insert(array(
			'name' => 'Login',
			'title' => 'Login',
			'unique' => true,
			'nature' => 'login',
			'lang_id' => null,
		));
	}
}

class ProfileModuleTableSeeder extends Seeder {

	public function run() {
		DB::table('angkorcms_modules')->insert(array(
			'name' => 'Profile',
			'title' => 'Profile',
			'unique' => true,
			'nature' => 'profile',
			'lang_id' => null,
		));
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
      		'updated_at' => date("Y-m-d H:i:s")
		));
	}
}
