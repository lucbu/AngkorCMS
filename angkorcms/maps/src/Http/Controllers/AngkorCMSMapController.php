<?php namespace AngkorCMS\Maps\Http\Controllers;

use AngkorCMS\Maps\Http\Requests\AngkorCMSMapRequest;
use AngkorCMS\Maps\Repositories\Eloquent\AngkorCMSMapRepository;
use Redirect;

class AngkorCMSMapController extends AngkorCMSMapBaseController {

	protected $repository;

	public function __construct(AngkorCMSMapRepository $repository) {
		$this->repository = $repository;
	}

	public function postUpdateMap($id, AngkorCMSMapRequest $request) {
		if ($map = $this->repository->update($id)) {
			return Redirect::route('angkorcmsmodules.edit', array($map->module_id));
		}
		return Redirect::route('angkorcmsmodules.index')->with('error', 'The module doesn\'t exist.');

	}
}