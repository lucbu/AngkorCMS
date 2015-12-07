<?php namespace AngkorCMS\Pages\Http\Controllers;

use AngkorCMS\Pages\Http\Requests\AngkorCMSBlockRequest;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSBlockRepository;
use Response;

class AngkorCMSBlockController extends AngkorCMSPageBaseController {

	protected $repository;

	public function __construct(AngkorCMSBlockRepository $repository) {
		$this->repository = $repository;
		$this->middleware('angkorcmsajax', array('only' => array('postAddBlockAjax', 'postDelBlockAjax')));
	}

	public function postAddBlockAjax(AngkorCMSBlockRequest $request) {
		$block = $this->repository->store();
		$data = array('block' => $block);
		return Response::json(array(
			'ok' => 1,
			'html' => view('angkorcms/pages/block/block', $data)->render(),
		));
	}

	public function postDelBlockAjax($id_block) {
		if ($this->repository->destroy($id_block)) {
			return Response::json(array(
				'ok' => 1,
				'idToDelete' => $id_block,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'Block doesn\'t exist',
		));
	}
}
