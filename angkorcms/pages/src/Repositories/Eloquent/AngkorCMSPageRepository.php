<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSPage;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSPageRepositoryInterface;
use Input;

class AngkorCMSPageRepository implements AngkorCMSPageRepositoryInterface {

	public function all() {
		$pages = AngkorCMSPage::orderBy('id', 'DESC')
			->get();
		return compact('pages');
	}

	public function allFull() {
		$pages = AngkorCMSPage::with('theme', 'theme.template', 'theme.template.blocks', 'translations', 'translations.lang', 'translations.lang.image', 'translations.blocks', 'translations.blocks.modules', 'translations.blocks.block', 'translations.blocks.modules.module')
			->orderBy('id', 'DESC')
			->get();
		return compact('pages');
	}

	public function getById($id) {
		$page = AngkorCMSPage::with('theme', 'theme.template', 'theme.template.blocks', 'translations', 'translations.lang', 'translations.lang.image', 'translations.blocks', 'translations.blocks.modules', 'translations.blocks.block', 'translations.blocks.modules.module')
			->find($id);
		return $page;
	}

	public function store() {
		$accessible = 0;
		if (Input::get('accessible') != null) {$accessible = 1;}
		$page = AngkorCMSPage::create(array(
			'name' => Input::get('name'),
			'theme_id' => Input::get('theme_id'),
			'accessible' => $accessible,
		));

		return $page;
	}

	public function update($id) {
		$accessible = 0;
		if (Input::get('accessible') != null) {$accessible = 1;}
		$page = AngkorCMSPage::find($id);
		if ($page == null) {
			return false;
		}
		$page->name = Input::get('name');
		$page->theme_id = Input::get('theme_id');
		$page->accessible = $accessible;
		$page->save();
		return $page;
	}

	public function destroy($id) {
		$page = AngkorCMSPage::find($id);
		if ($page == null) {
			return false;
		}
		$page->delete();
		return true;
	}
}