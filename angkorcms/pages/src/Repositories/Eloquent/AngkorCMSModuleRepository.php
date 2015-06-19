<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSModule;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSModuleRepositoryInterface;
use Config;
use Input;

class AngkorCMSModuleRepository implements AngkorCMSModuleRepositoryInterface {

	public function all() {
		$modules = AngkorCMSModule::with('lang', 'lang.image')
			->orderBy('id', 'ASC')
			->get();
		return $modules;
	}

	public function index($n) {
		$modules = AngkorCMSModule::with('lang', 'lang.image')
			->orderBy('id', 'ASC')
			->paginate($n);
		return $modules;
	}

	public function natureAvailableNotUnique() {
		$natures = AngkorCMSModule::where('unique', false)
			->lists('nature')->all();
		return $natures;
	}

	public function indexNotUnique($n) {
		$modules = AngkorCMSModule::with('lang', 'lang.image')
			->where('unique', false)
			->orderBy('id', 'ASC')
			->paginate($n);
		return $modules;
	}

	public function indexNotUniqueWithFilters() {
		$n = 10;
		if (Input::get('items_per_page') != null && is_numeric(Input::get('items_per_page')) && intval(Input::get('items_per_page')) > 0) {
			$n = intval(Input::get('items_per_page'));
		}

		$modules = AngkorCMSModule::with('lang', 'lang.image')
			->where('unique', false);

		//FILTERS
		if (Input::get('filter_lang') != 'null' && Input::get('filter_lang') != null) {
			$modules = $modules->where('lang_id', intval(Input::get('filter_lang')));
		}
		if (Input::get('filter_nature') != 'null' && Input::get('filter_nature') != null) {
			$modules = $modules->where('nature', Input::get('filter_nature'));
		}

		//ORDER
		$orderby = 'id';
		$ordering = 'ASC';
		if (Input::get('ordering') == 'ASC' or Input::get('ordering') == 'DESC') {
			$ordering = Input::get('ordering');
		}
		if (Input::get('order_by') == 'name') {
			$orderby = 'name';
		}
		if (Input::get('order_by') == 'nature') {
			$orderby = 'nature';
		}
		if (Input::get('order_by') == 'lang') {
			$orderby = 'lang_id';
		}
		$modules = $modules->orderBy($orderby, $ordering);

		$modules = $modules->paginate($n);

		return $modules;
	}

	public function getById($id) {
		$module = AngkorCMSModule::find($id);
		return $module;
	}

	public function allModulesShort() {
		$modulesShort = AngkorCMSModule::lists('name', 'id', 'lang')->all();
		return $modulesShort;
	}

	public function store() {
		$nature = null;
		if (Input::get('nature') != 'NULL') {
			$nature = Input::get('nature');
			if (!array_key_exists($nature, Config::get('angkorcmsmodules.natures'))) {
				return false;
			}
		}
		$module = AngkorCMSModule::create(array(
			'name' => Input::get('name'),
			'title' => Input::get('title'),
			'lang_id' => Input::get('lang_id'),
			'nature' => $nature,
		));

		return $module;
	}

	public function update($id) {
		$module = AngkorCMSModule::find($id);
		if ($module == null or $module->unique) {
			return false;
		}
		$module->name = Input::get('name');
		$module->title = Input::get('title');
		$module->lang_id = Input::get('lang_id');
		$module->save();
		return $module;
	}

	public function destroy($id) {
		$module = AngkorCMSModule::find($id);
		if ($module == null or $module->unique) {
			return false;
		}
		$module->delete();
		return true;
	}
}