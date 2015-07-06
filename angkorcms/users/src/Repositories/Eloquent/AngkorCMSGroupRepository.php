<?php namespace AngkorCMS\Users\Repositories\Eloquent;

use AngkorCMS\Users\Repositories\Contracts\AngkorCMSGroupRepositoryInterface;
use AngkorCMS\Users\AngkorCMSGroup;
use Hash;
use Input;

class AngkorCMSGroupRepository implements AngkorCMSGroupRepositoryInterface {

	private function save($group) {
		$group->name = Input::get('name');
		if(($group_parent_id = Input::get('group_parent_id')) == 0){
			$group_parent_id = null;
		}
		$group->group_parent_id = $group_parent_id;
		$group->save();
	}

	public function index() {
		return $groups = AngkorCMSGroup::all();
	}

	public function allGroupShort() {
		return $groupsAll = AngkorCMSGroup::lists('name', 'id')->all();
	}

	public function store() {
		$group = new AngkorCMSGroup;
		$this->save($group);
	}

	public function show($id) {
		$group = AngkorCMSGroup::with('users')->find($id);
		if ($group == null) {
			return null;
		}
		return compact('group');
	}

	public function edit($id) {
		$group = AngkorCMSGroup::find($id);
		return compact('group');
	}

	public function update($id) {
		$group = AngkorCMSGroup::find($id);
		if (is_null($group)) {
			return false;
		}
		$this->save($group);
		return $group;
	}

	public function destroy($id) {
		$group = AngkorCMSGroup::find($id);
		if (is_null($group)) {
			return false;
		}
		$group->delete();
	}

}
