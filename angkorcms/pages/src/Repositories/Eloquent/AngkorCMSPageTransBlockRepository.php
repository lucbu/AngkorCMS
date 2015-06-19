<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSPageTransBlock;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSPageTransBlockRepositoryInterface;
use Input;

class AngkorCMSPageTransBlockRepository implements AngkorCMSPageTransBlockRepositoryInterface {

	public function getByPageTransAndBlock($page_trans_id, $block_id) {
		$pages_trans_block = AngkorCMSPageTransBlock::with('block', 'modules', 'modules.module')
			->where('page_trans_id', $page_trans_id)
			->where('block_id', $block_id)
			->first();
		return $pages_trans_block;
	}

	public function getByPageTransAndBlockInput() {
		$page_trans_id = Input::get('page_trans_id');
		$block_id = Input::get('block_id');
		return $this->getByPageTransAndBlock($page_trans_id, $block_id);
	}

	public function getById($id) {
		$page_trans_block = AngkorCMSPageTransBlock::with('block', 'modules', 'modules.module')->find($id);
		return $page_trans_block;
	}

	public function store() {
		$pageTransBlock = AngkorCMSPageTransBlock::create(array(
			'page_trans_id' => Input::get('page_trans_id'),
			'block_id' => Input::get('block_id'),
		));
		return $pageTransBlock;
	}

	public function changeModulesPositions() {
		//TODO module + position
	}

	public function destroy($id) {
		$page_trans_block = AngkorCMSPageTransBlock::find($id);
		if ($page_trans_block == null) {
			return false;
		}
		$page_trans_block->delete();
		return true;
	}
}