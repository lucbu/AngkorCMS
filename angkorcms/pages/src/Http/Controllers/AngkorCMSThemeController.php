<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\Pages\Http\Requests\AngkorCMSThemeRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSTemplateRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSThemeRepository;
use Input;
use Redirect;

class AngkorCMSThemeController extends AngkorCMSPageBaseController {

	protected $repository;

	public function __construct(AngkorCMSThemeRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {

	}

	public function create($template_id, AngkorCMSTemplateRepository $template_repository) {
		$template = $template_repository->getById($template_id);
		if (is_null($template)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The template doesn\'t exist.');
		}
		return view('angkorcms/pages/theme/create')->with('template_id', $template->id);
	}

	public function store($template_id, AngkorCMSThemeRequest $request, AngkorCMSTemplateRepository $template_repository) {
		$template = $template_repository->getById(Input::get('template_id'));
		$theme = $this->repository->store($template->name);
		if (!$theme) {
			return Redirect::route('angkorcmstemplates.angkorcmsthemes.create', $template_id)
				->with('error', 'Check the files\' extension.');
		}
		return Redirect::route('angkorcmstemplates.angkorcmsthemes.edit', array($theme->template->id, $theme->id))->with('info', 'The page has been created.');
	}

	public function edit($template_id, $id) {

		$theme = $this->repository->getById($id);
		if (is_null($theme)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The theme doesn\'t exist.');
		}
		$template_name = $theme->template->name;
		$name = $theme->name;
		$pathCss = "css\\" . $template_name . "\\" . $name . "\\";
		$pathJs = "js\\" . $template_name . "\\" . $name . "\\";
		$pathView = "..\\resources\\views\\templates\\" . $template_name . "\\" . $name . "\\";
		$style = file_get_contents($pathCss . '\\' . $theme->style);
		$view = file_get_contents($pathView . '\\' . $theme->view);
		$script = file_get_contents($pathJs . '\\' . $theme->script);

		$data = array("theme" => $theme, "style" => $style, "script" => $script, "view" => $view);

		return view('angkorcms/pages/theme/edit', $data);
	}

	public function update($template_id, $id, AngkorCMSThemeRequest $request) {
		if (!$theme = $this->repository->update($id)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The theme doesn\'t exist.');
		}

		return Redirect::route('angkorcmstemplates.angkorcmsthemes.edit', array($theme->template->id, $theme->id))->with('info', 'The page has been edited.');
	}

	public function destroy($template_id, $id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The page doesn\'t exist.');
		}
		return Redirect::route('angkorcmstemplates.edit', $template_id)
			->with('info', 'The theme has been deleted.');
	}
}
