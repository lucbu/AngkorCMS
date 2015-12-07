<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use AngkorCMS\Pages\Http\Requests\AngkorCMSPageRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSTemplateRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSThemeRepository;
use Redirect;

class AngkorCMSPageController extends AngkorCMSPageBaseController {

	protected $repository;

	public function __construct(AngkorCMSPageRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {
		return view('angkorcms/pages/page/index', $this->repository->all());
	}

	public function create(AngkorCMSTemplateRepository $template_repository) {
		$templates = $template_repository->all();
		$data = array("templates" => $templates);
		return view('angkorcms/pages/page/create', $data);
	}

	public function store(AngkorCMSPageRequest $request) {
		$page = $this->repository->store();
		return Redirect::route('angkorcmspages.edit', $page->id)
			->with('info', 'The page has been created.');
	}

	public function edit($id, AngkorCMSLangRepository $lang_repository, AngkorCMSThemeRepository $theme_repository) {
		$page = $this->repository->getById($id);
		if (!$page) {
			return Redirect::route('angkorcmspages.index')->with('error', 'The page doesn\'t exist.');
		}
		$themes = $theme_repository->getByTemplate($page->theme->template_id);
		$nb_langs = $lang_repository->count();
		$data = array("page" => $page, "nb_langs" => $nb_langs, "themes" => $themes);
		return view('angkorcms/pages/page/edit', $data);
	}

	public function update($id, AngkorCMSPageRequest $request) {
		if (!$page = $this->repository->update($id)) {
			return Redirect::route('angkorcmspages.index')->with('error', 'The page doesn\'t exist.');
		}

		return Redirect::route('angkorcmspages.edit', $page->id)
			->with('info', 'The page has been edited.');
	}

	public function destroy($id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmspages.index')->with('error', 'The page doesn\'t exist.');
		}
		return Redirect::route('angkorcmspages.index')
			->with('info', 'The page has been deleted.');
	}
}
