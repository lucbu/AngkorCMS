<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use AngkorCMS\Pages\Http\Requests\AngkorCMSModuleRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSModuleRepository;
use App;
use Config;
use Redirect;

class AngkorCMSModuleController extends AngkorCMSPageBaseController {

	protected $repository;
	protected $nature_repository = array();

	public function __construct(AngkorCMSModuleRepository $repository) {
		$this->repository = $repository;
		foreach (Config::get('angkorcmsmodules.natures') as $key => $value) {

			if (!Config::has($value . '.unique') || !Config::get($value . '.unique')) {
				$configRepository = $value . '.repository';
				$repo = Config::get($configRepository);
				$this->nature_repository[$key] = new $repo;
			}
		}
	}

	public function index(AngkorCMSLangRepository $lang_repository) {
		$natures = $this->repository->natureAvailableNotUnique();
		$natures = array_combine($natures, $natures);
		$langs = $lang_repository->allShort();
		$modules = $this->repository->indexNotUniqueWithFilters();

		$data = array("modules" => $modules, 'langs' => $langs, 'natures' => $natures);
		return view('angkorcms/pages/module/index', $data);
	}

	public function create(AngkorCMSLangRepository $lang_repository) {
		$natures = array();
		foreach (Config::get('angkorcmsmodules.natures') as $key => $value) {
			if (!Config::has($value . '.unique') || !Config::get($value . '.unique')) {
				$natures[$key] = $key;
			}
		}
		$data = array('langs' => $lang_repository->allLangsShort(), 'natures' => $natures);
		return view('angkorcms/pages/module/create', $data);
	}

	public function store(AngkorCMSModuleRequest $request) {
		if ($module = $this->repository->store()) {
			if ($module->nature != null) {
				$this->nature_repository[$module->nature]->store($module->id);
			}
			return Redirect::route('angkorcmsmodules.edit', $module->id)
				->with('info', 'The module has been created.');
		}
		return Redirect::route('angkorcmsmodules.index')
			->with('error', 'The nature doesn\'t exist.');
	}

	public function edit($id, AngkorCMSLangRepository $lang_repository) {
		$module = $this->repository->getById($id);
		if (is_null($module)) {
			return Redirect::route('angkorcmsmodules.index')->with('error', 'The module doesn\'t exist.');
		}
		if ($module->unique) {
			App::abort(404);
		}
		$data = array('langs' => $lang_repository->allLangsShort(), 'module' => $module);
		if ($module->nature != null) {
			$config = Config::get('angkorcmsmodules.natures')[$module->nature];
			if (!Config::get($config . '.unique')) {
				$view = Config::get($config . '.makerView');
				$data['view'] = $view;
			}
		}
		return view('angkorcms/pages/module/edit', $data);
	}

	public function update($id, AngkorCMSModuleRequest $request) {
		if (!$module = $this->repository->update($id)) {
			return Redirect::route('angkorcmsmodules.index')->with('error', 'The module doesn\'t exist.');
		}
		return Redirect::route('angkorcmsmodules.edit', $module->id)
			->with('info', 'The module has been edited.');
	}

	public function destroy($id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmsmodules.index')->with('error', 'The module doesn\'t exist.');
		}
		return Redirect::route('angkorcmsmodules.index')
			->with('info', 'The module has been deleted.');
	}
}
