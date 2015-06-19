<?php namespace AngkorCMS\MultiLanguages\Repositories\Eloquent;

use AngkorCMS\MultiLanguages\AngkorCMSLang;
use AngkorCMS\MultiLanguages\Repositories\Contracts\AngkorCMSLangRepositoryInterface;
use Input;

class AngkorCMSLangRepository implements AngkorCMSLangRepositoryInterface {

	public function all() {
		$langs = AngkorCMSLang::with('image')
			->orderBy('id', 'DESC')
			->get();
		return $langs;
	}

	public function getIdByCode($code) {
		$lang_id = AngkorCMSLang::select('id')
			->where('code', $code)
			->first();
		if ($lang_id != null) {
			return $lang_id->id;
		} else {
			return -1;
		}
	}

	public function getByCode($code) {
		$lang = AngkorCMSLang::where('code', $code)
			->first();
		if ($lang == null) {
			return false;
		}
		return $lang;
	}

	public function count() {
		return $count = AngkorCMSLang::count();
	}

	public function allCode() {
		return $langsAllShort = AngkorCMSLang::lists('code')->all();
	}

	public function allLangsShort() {
		return $langsAllShort = AngkorCMSLang::lists('description', 'id')->all();
	}

	public function allShort() {
		return $langsAllShort = AngkorCMSLang::all();
	}

	public function store() {
		$image_id = null;
		if (Input::get('image_id') != null) {
			$image_id = Input::get('image_id');
		}
		$lang = AngkorCMSLang::create(array(
			'code' => Input::get('code'),
			'description' => Input::get('description'),
			'image_id' => $image_id,
		));
		return $lang->id;
	}

	public function show($id) {
		$lang = AngkorCMSLang::find($id);
		if ($lang == null) {
			return false;
		}
		return compact('lang');
	}

	public function notInShort($trads) {
		$listIdLang = array();
		foreach ($trads as $trad) {
			$listIdLang[] = $trad->lang->id;
		}
		$langs = AngkorCMSLang::whereNotIn('id', $listIdLang)->get()->lists('description', 'id')->all();
		return compact('langs');
	}

	public function update($id) {
		$image_id = null;
		if (Input::get('image_id') != null) {
			$image_id = Input::get('image_id');
		}
		$lang = AngkorCMSLang::find($id);

		if ($lang == null) {
			return false;
		}
		$lang->code = Input::get('code');
		$lang->description = Input::get('description');
		$lang->image_id = $image_id;
		$lang->save();
		return $lang;
	}

	public function destroy($id) {
		$lang = AngkorCMSLang::find($id);
		if ($lang == null) {
			return false;
		}
		$lang->delete();
		return true;
	}
}