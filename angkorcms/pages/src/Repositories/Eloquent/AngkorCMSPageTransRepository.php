<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSPageTrans;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSPageTransRepositoryInterface;
use Input;

class AngkorCMSPageTransRepository implements AngkorCMSPageTransRepositoryInterface {

	public function AngkorCMSPageTrans($page_id) {
		$pages_trans = AngkorCMSPage::with('blocks', 'blocks.block', 'blocks.modules', 'blocks.modules.module')
			->where('page_id', $page_id)
			->get();
		return compact('page_trans');
	}

	public function getSlugByPageLang($page_id, $lang_id) {
		$page_trans_slug = AngkorCMSPageTrans::select('slug')
			->where('page_id', $page_id)
			->where('lang_id', $lang_id)
			->first();
		return $page_trans_slug;
	}

	public function getBySlug($slug) {
		$page_trans = AngkorCMSPageTrans::with('page', 'page.theme', 'page.theme.template', 'blocks', 'blocks.block', 'blocks.modules', 'blocks.modules.module', 'blocks.modules.module.lang')
			->where('slug', $slug)
			->first();
		return $page_trans;
	}

	public function getById($id) {
		$page_trans = AngkorCMSPageTrans::with('page', 'blocks', 'blocks.block', 'blocks.modules', 'blocks.modules.module', 'lang', 'lang.image')->find($id);
		return $page_trans;
	}

	public function store() {
		$page_trans = AngkorCMSPageTrans::create(array(
			'title' => Input::get('title'),
			'slug' => Input::get('slug'),
			'page_id' => Input::get('page_id'),
			'lang_id' => Input::get('lang_id'),
		));
		return $page_trans;
	}

	public function getListTradLang($page_id) {
		return AngkorCMSPageTrans::select('lang_id')->where('page_id', $page_id)->get();
	}

	public function update($id) {
		$page_trans = AngkorCMSPageTrans::find($id);
		if ($page_trans == null) {
			return false;
		}
		$page_trans->title = Input::get('title');
		$page_trans->slug = Input::get('slug');
		$page_trans->save();
		return $page_trans;
	}

	public function destroy($id) {
		$page_trans = AngkorCMSPageTrans::find($id);
		if ($page_trans == null) {
			return false;
		}
		$page_trans->delete();
		return true;
	}
}
