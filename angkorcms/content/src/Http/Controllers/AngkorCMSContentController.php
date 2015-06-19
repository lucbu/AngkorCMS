<?php namespace AngkorCMS\Content\Http\Controllers;

use AngkorCMS\Content\Http\Requests\AngkorCMSContentRequest;
use AngkorCMS\Content\Repositories\Eloquent\AngkorCMSContentRepository;
use Redirect;

class AngkorCMSContentController extends AngkorCMSContentBaseController {

	protected $repository;

	public function __construct(AngkorCMSContentRepository $repository) {
		parent::__construct();
		$this->repository = $repository;
	}

	public function postUpdateContent($id, AngkorCMSContentRequest $request) {
		if ($content = $this->repository->update($id)) {
			return Redirect::route('angkorcmsmodules.edit', array($content->module_id));
		}
		return Redirect::route('angkorcmsmodules.index')->with('error', 'The module doesn\'t exist.');

	}
}