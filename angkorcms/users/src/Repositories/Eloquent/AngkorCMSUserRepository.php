<?php namespace AngkorCMS\Users\Repositories\Eloquent;

use AngkorCMS\Users\Repositories\Contracts\AngkorCMSUserRepositoryInterface;
use App\User;
use Hash;
use Input;

class AngkorCMSUserRepository implements AngkorCMSUserRepositoryInterface {

	private function save($user) {
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->admin = Input::get('admin') ? 1 : 0;
		$user->save();
	}

	public function index($n) {
		return $users = User::paginate($n);
	}

	public function allUserShort() {
		return $usersAll = User::lists('name', 'id')->all();
	}

	public function store() {
		$user = new User;
		$user->password = Hash::make(Input::get('password'));
		$this->save($user);
	}

	public function show($id) {
		$user = User::find($id);
		if ($user == null) {
			return null;
		}
		return compact('user');
	}

	public function edit($id) {
		$user = User::find($id);
		return compact('user');
	}

	public function update($id) {
		$user = User::find($id);
		if (is_null($user)) {
			return false;
		}
		$this->save($user);
		return $user;
	}

	public function destroy($id) {
		$user = User::find($id);
		if (is_null($user)) {
			return false;
		}
		$user->delete();
	}

}
