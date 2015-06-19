<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\Pages\Http\Requests\AngkorCMSGroupModuleRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSGroupModuleRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSModuleGroupModuleRepository;
use Response;

class AngkorCMSGroupModuleController extends AngkorCMSPageBaseController {

	protected $repository;
	protected $modulegroupmodule_repository;

	public function __construct(AngkorCMSGroupModuleRepository $repository, AngkorCMSModuleGroupModuleRepository $modulegroupmodule_repository) {
		parent::__construct();
		$this->repository = $repository;
		$this->modulegroupmodule_repository = $modulegroupmodule_repository;
		$this->middleware('angkorcmsajax', array('only' => array('postAddModule', 'postDelModule', 'postSaveOrder')));
	}

	public function postAddModule(AngkorCMSGroupModuleRequest $request) {
		$module = $this->modulegroupmodule_repository->store();
		$data = array('module' => $module);
		return Response::json(array(
			'ok' => 1,
			'html' => view('angkorcms/pages/groupsmodules/makerModuleRow', $data)->render(),
		));
	}

	public function postSaveOrder() {
		if ($this->modulegroupmodule_repository->reorder()) {
			return Response::json(array(
				'ok' => 1,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'An error occurred',
		));
	}

	public function postDelModule($id_module) {
		if ($this->modulegroupmodule_repository->destroy($id_module)) {
			return Response::json(array(
				'ok' => 1,
				'idToDelete' => $id_module,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'List item doesn\'t exist',
		));
	}
}