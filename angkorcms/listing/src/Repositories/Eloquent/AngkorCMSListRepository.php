<?php namespace AngkorCMS\Listing\Repositories\Eloquent;

use AngkorCMS\Listing\AngkorCMSList;
use AngkorCMS\Listing\Repositories\Contracts\AngkorCMSListRepositoryInterface;
use Input;

class AngkorCMSListRepository implements AngkorCMSListRepositoryInterface {

	public function all() {
		$lists = AngkorCMSList::orderBy('id', 'DESC')
			->get();
		return compact('lists');
	}

	public function getByModule($id_module) {
		return AngkorCMSList::with('items')
			->where('module_id', $id_module)->first();
	}

	public function store($id_module) {
		$list = AngkorCMSList::create(array(
			'module_id' => $id_module,
		));

		return $list;
	}

	public function update($id) {
		$list = AngkorCMSList::find($id);
		if ($list == null) {
			return false;
		}
		$list->save();
		return compact('list');
	}

	public function destroy($id) {
		$list = AngkorCMSList::find($id);
		if ($list == null) {
			return false;
		}
		$list->delete();
		return true;
	}
}