<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSPageTransBlockModule;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSPageTransBlockModuleRepositoryInterface;
use Input;

class AngkorCMSPageTransBlockModuleRepository implements AngkorCMSPageTransBlockModuleRepositoryInterface {

	public function getById($id) {
		$page_trans_block_module = AngkorCMSPageTransBlockModule::with('module')->find($id);
		return $page_trans_block_module;
	}

	public function store($pageTransBlock) {
		$pageTransBlockModule = AngkorCMSPageTransBlockModule::create(array(
			'position' => 4294967297,
			'page_trans_block_id' => $pageTransBlock->id,
			'module_id' => Input::get('module_id'),
		));
		return $pageTransBlockModule;
	}

	public function reorder() {
		$pageTransBlock_id = Input::get('block_id');

		$orders = Input::get('order');
		$listPageTransBlockModule = array();
		foreach ($orders as $value) {
			$pageTransBlockModule = $this->getById($value);
			if ($pageTransBlockModule == null || $pageTransBlockModule->page_trans_block_id != $pageTransBlock_id) {
				return false;
			}
			$listPageTransBlockModule[] = $pageTransBlockModule;
		}
		$i = 0;
		foreach ($listPageTransBlockModule as $pageTransBlockModule) {
			$pageTransBlockModule->position = $i;
			$pageTransBlockModule->save();
			$i++;
		}
		return true;
	}

	public function destroy($id) {
		$page_trans_block_module = AngkorCMSPageTransBlockModule::find($id);
		if ($page_trans_block_module == null) {
			return false;
		}
		$page_trans_block_module->delete();
		return true;
	}
}