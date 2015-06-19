<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\Pages\Http\Requests\AngkorCMSTemplateRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSTemplateRepository;
use Redirect;

class AngkorCMSTemplateController extends AngkorCMSPageBaseController {

	protected $repository;

	public function __construct(AngkorCMSTemplateRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {
		$data = array("templates" => $this->repository->all());
		return view('angkorcms/pages/template/index', $data);
	}

	public function create() {
		return view('angkorcms/pages/template/create');
	}

	public function store(AngkorCMSTemplateRequest $request) {
		$template = $this->repository->store();
		return Redirect::route('angkorcmstemplates.edit', $template->id)
			->with('info', 'The template has been created.');
	}

	public function edit($id) {
		$template = $this->repository->getById($id);
		if (!$template) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The template doesn\'t exist.');
		}
		$data = array("template" => $template);
		return view('angkorcms/pages/template/edit', $data);
	}

	public function update($id, AngkorCMSTemplateRequest $request) {
		if (!$template = $this->repository->update($id)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The template doesn\'t exist.');
		}

		return Redirect::route('angkorcmstemplates.edit', $template->id)
			->with('info', 'The template has been edited.');
	}

	public function destroy($id) {
		if (!$this->repository->destroy($id)) {
			return Redirect::route('angkorcmstemplates.index')->with('error', 'The template doesn\'t exist.');
		}
		return Redirect::route('angkorcmstemplates.index')
			->with('info', 'The template has been deleted.');
	}
}
