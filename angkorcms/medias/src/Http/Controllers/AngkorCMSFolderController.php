<?php namespace AngkorCMS\Medias\Http\Controllers;

use AngkorCMS\Medias\Http\Controllers\AngkorCMSMediaBaseController;
use AngkorCMS\Medias\Http\Requests\AngkorCMSFolderChangeFolderRequest;
use AngkorCMS\Medias\Http\Requests\AngkorCMSFolderRequest;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use Input;
use Response;

class AngkorCMSFolderController extends AngkorCMSMediaBaseController {

	protected $repository;

	public function __construct(AngkorCMSFolderRepository $repository) {
		parent::__construct();
		$this->repository = $repository;
		$this->middleware('angkorcmsajax');
	}

	public function postFolderAjax(AngkorCMSFolderRequest $request) {
		if ($folder = $this->repository->store()) {
			return Response::json(array(
				'ok' => 1,
				'id' => $folder->id,
				'name' => $folder->name,
				'html' => view('angkorcms/medias/folder')->with(array('folder' => $folder))->render(),
			));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Sorry a problem occured'));
		}
	}

	public function putParentFolderAjax(AngkorCMSFolderChangeFolderRequest $request) {
		if ($this->repository->changeFolder()) {
			return Response::json(array('ok' => 1));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Problem changing folder.'));
		}
	}

	public function deleteFolderAjax() {
		$id = Input::get('folder_id');
		if ($file = $this->repository->destroy($id)) {
			return Response::json(array('ok' => 1, 'id' => $id));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Problem deleting image.'));
		}
	}

	public function postOpenFolderAjax(AngkorCMSImageRepository $image_repository) {
		$folderid = null;
		if (is_numeric(Input::get('folder_id'))) {
			$folderid = Input::get('folder_id');
		}
		$folder = $this->repository->getById($folderid);
		$images = $image_repository->getListByFolder($folderid);
		$folders = $this->repository->getListByFolder($folderid);
		$data = array_merge($images, $folders, $folder);
		return Response::json(array(
			'ok' => 1,
			'folder' => $folder,
			'html' => view('angkorcms/medias/listMedia')->with($data)->render()));
	}
}
