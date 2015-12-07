<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSModuleGroupModule;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSModuleGroupModuleRepositoryInterface;
use Input;

class AngkorCMSModuleGroupModuleRepository implements AngkorCMSModuleGroupModuleRepositoryInterface {

	public function all() {
		$modules = AngkorCMSModuleGroupModule::orderBy('id', 'DESC')
			->get();
		return $modules;
	}

	public function getById($id) {
		return AngkorCMSModuleGroupModule::find($id);
	}

	public function store() {
		$module = AngkorCMSModuleGroupModule::create(array(
			'groupmodule_id' => Input::get('groupmodule_id'),
			'module_id' => Input::get('module_id'),
		));

		return $module;
	}

	public function reorder() {
		$groupmodule_id = Input::get('groupmodule_id');
		$orders = Input::get('order');
		$listModules = array();
		foreach ($orders as $value) {
			$module = $this->getById($value);
			if ($module == null || $module->groupmodule_id != $groupmodule_id) {
				return false;
			}
			$listModules[] = $module;
		}
		$i = 0;
		foreach ($listModules as $module) {
			$module->position = $i;
			$module->save();
			$i++;
		}
		return true;
	}

	public function destroy($id) {
		$module = AngkorCMSModuleGroupModule::find($id);
		if ($module == null) {
			return false;
		}
		$module->delete();
		return true;
	}
}