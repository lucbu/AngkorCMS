<?php namespace AngkorCMS\MultiLanguages\Http\Controllers;

use AngkorCMS\MultiLanguages\Http\Controllers\AngkorCMSLangBaseController;
use AngkorCMS\MultiLanguages\Http\Requests\AngkorCMSLangRequest;
use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use Redirect;

class AngkorCMSLangController extends AngkorCMSLangBaseController {

	protected $repository;

	public function __construct(AngkorCMSLangRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {
		return view('angkorcms/multilanguages/index', array('langs' => $this->repository->all()));
	}

	public function create() {
		return view('angkorcms/multilanguages/create');
	}

	public function store(AngkorCMSLangRequest $request) {
		$this->repository->store();
		return Redirect::route('angkorcmslang.index')
			->with('info', 'The language has been created.');
	}

	public function edit($id) {
		$lang = $this->repository->show($id);

		if (!$lang) {
			return Redirect::route('angkorcmslang.index')->with('error', 'The language doesn\'t exist.');
		}

		$data = array_merge($lang);
		return view('angkorcms/multilanguages/edit', $data);
	}

	public function update($id, AngkorCMSLangRequest $request) {
		if (!$this->repository->update($id)) {
			return Redirect::route('angkorcmslang.index')->with('error', 'The language doesn\'t exist.');
		}

		return Redirect::route('angkorcmslang.index')
			->with('info', 'The language has been edited.');
	}

	public function destroy($id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmslang.index')->with('error', 'The language doesn\'t exist.');
		}

		return Redirect::route('angkorcmslang.index')
			->with('info', 'The language has been deleted.');
	}

	public function changeLang($code) {
		$newlang = $this->repository->getByCode($code);
		if ($newlang == null) {
			App::abort(404);
		} else {
			return Redirect::back()->with('newLang', $newlang);
		}
	}
}
