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
		if(($group_id = Input::get('group_id')) == 0){
			$group_id = null;
		}
		$user->group_id = $group_id;
		$user->save();
	}

	public function index($n) {
		return $users = User::paginate($n);
	}

	public function getByGroupId($group_id) {
		$users = User::where('group_id', $group_id)->get();
		return compact('users');
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
		if(Input::has('password') && Input::has('password_new')){
			$user->password = Hash::make(Input::get('password_new'));
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
