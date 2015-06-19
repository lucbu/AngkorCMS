<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSGroupModule;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSGroupModuleRepositoryInterface;

class AngkorCMSGroupModuleRepository implements AngkorCMSGroupModuleRepositoryInterface {

	public function all() {
		$groups_modules = AngkorCMSGroupModule::orderBy('id', 'DESC')
			->get();
		return compact('group_modules');
	}

	public function getByModule($id_module) {
		return AngkorCMSGroupModule::with('modules', 'modules.module', 'modules.module.lang', 'modules.module.lang.image')
			->where('module_id', $id_module)
			->first();
	}

	public function store($id_module) {
		$group_module = AngkorCMSGroupModule::create(array(
			'module_id' => $id_module,
		));

		return $group_module;
	}

	public function update($id) {
		$group_module = AngkorCMSGroupModule::find($id);
		if ($group_module == null) {
			return false;
		}
		$group_module->save();
		return compact('group_module');
	}

	public function destroy($id) {
		$group_module = AngkorCMSGroupModule::find($id);
		if ($group_module == null) {
			return false;
		}
		$group_module->delete();
		return true;
	}
}