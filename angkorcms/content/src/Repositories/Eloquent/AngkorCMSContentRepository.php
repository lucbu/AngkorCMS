<?php namespace AngkorCMS\Content\Repositories\Eloquent;

use AngkorCMS\Content\AngkorCMSContent;
use AngkorCMS\Content\Repositories\Contracts\AngkorCMSContentRepositoryInterface;
use Input;

class AngkorCMSContentRepository implements AngkorCMSContentRepositoryInterface {
	public function all() {
		$contents = AngkorCMSContent::orderBy('id', 'DESC')
			->get();
		return compact('contents');
	}

	public function getByModule($id_module) {
		return AngkorCMSContent::where('module_id', $id_module)->first();
	}

	public function store($id_module) {
		$content = AngkorCMSContent::create(array(
			'content' => '',
			'module_id' => $id_module,
		));

		return $content;
	}

	public function update($id) {
		$content = AngkorCMSContent::find($id);
		if ($content == null) {
			return false;
		}
		$content->content = Input::get('content');
		$content->save();
		return $content;
	}

	public function destroy($id) {
		$content = AngkorCMSContent::find($id);
		if ($content == null) {
			return false;
		}
		$content->delete();
		return true;
	}
}