<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSBlock;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSBlockRepositoryInterface;
use Input;

class AngkorCMSBlockRepository implements AngkorCMSBlockRepositoryInterface {

	public function all() {
		$blocks = AngkorCMSBlock::orderBy('id', 'DESC')
			->get();
		return compact('blocks');
	}

	public function getById($id) {
		$block = AngkorCMSBlock::find($id);
		return $block;
	}

	public function getByTemplate($id_template) {
		$block = AngkorCMSBlock::orderBy('id', 'DESC')
			->where('template_id', $id_template)
			->get();
		return compact('block');
	}

	public function store() {
		$block = AngkorCMSBlock::create(array(
			'name' => Input::get('name'),
			'template_id' => Input::get('template_id'),
		));

		return $block;
	}

	public function update($id) {
		$block = AngkorCMSBlock::find($id);
		if ($block == null) {
			return false;
		}
		$block->name = Input::get('name');
		$block->template_id = Input::get('template_id');
		$block->save();
		return $block;
	}

	public function destroy($id) {
		$block = AngkorCMSBlock::find($id);
		if ($block == null) {
			return false;
		}
		$block->delete();
		return true;
	}
}