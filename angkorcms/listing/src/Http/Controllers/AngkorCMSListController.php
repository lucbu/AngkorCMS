<?php namespace AngkorCMS\Listing\Http\Controllers;

use AngkorCMS\Listing\Http\Requests\AngkorCMSListRequest;
use AngkorCMS\Listing\Http\Requests\AngkorCMSListItemRequest;
use AngkorCMS\Listing\Repositories\Eloquent\AngkorCMSListRepository;
use AngkorCMS\Listing\Repositories\Eloquent\AngkorCMSListItemRepository;
use Response;

class AngkorCMSListController extends AngkorCMSListBaseController {

	protected $repository;
	protected $list_item_repository;

	public function __construct(AngkorCMSListRepository $repository, AngkorCMSListItemRepository $list_item_repository) {
		parent::__construct();
		$this->repository = $repository;
		$this->list_item_repository = $list_item_repository;
		$this->middleware('angkorcmsajax', array('only' => array('postAddListItem', 'postDelListItem', 'postSaveOrder')));
	}
	
	public function postAddListItem(AngkorCMSListItemRequest $request) {
		$id = $this->list_item_repository->store()->id;
		$list_item = $this->list_item_repository->getById($id);
		$data = array('list_item' => $list_item);
		return Response::json(array(
			'ok' => 1,
			'html' => view('angkorcms/listing/makerListItemRow', $data)->render(),
		));
	}

	public function postSaveOrder() {
		if ($this->list_item_repository->reorder()) {
			return Response::json(array(
				'ok' => 1,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'An error occurred',
		));
	}

	public function postDelListItem($id_slide) {
		if ($this->list_item_repository->destroy($id_slide)) {
			return Response::json(array(
				'ok' => 1,
				'idToDelete' => $id_slide,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'List item doesn\'t exist',
		));
	}
}