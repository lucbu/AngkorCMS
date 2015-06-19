<?php namespace AngkorCMS\Medias\Http\Controllers;

use AngkorCMS\Medias\Http\Controllers\AngkorCMSMediaBaseController;
use AngkorCMS\Medias\Http\Requests\AngkorCMSImageRequest;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use Input;
use Response;
use View;

class AngkorCMSImageController extends AngkorCMSMediaBaseController {

	protected $repository;

	public function __construct(AngkorCMSImageRepository $repository) {
		parent::__construct();
		$this->repository = $repository;
		$this->middleware('angkorcmsajax');
	}

	public function postStoreImageAjax(AngkorCMSImageRequest $request) {
		if ($image = $this->repository->store()) {
			return Response::json(array(
				'ok' => 1,
				'id' => $image->id,
				'name' => $image->name,
				'path' => $image->path,
				'filename' => $image->filename,
				'extension' => $image->extension,
				'html' => view('angkorcms/medias/image')->with(array('image' => $image))->render(),
			));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Désolé mais votre image ne peut pas être envoyée !'));
		}
	}

	public function postChangeImageFolderAjax() {
		if ($file = $this->repository->changeFolder()) {
			return Response::json(array('ok' => 1, 'id' => $id));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Problem deleting image.'));
		}
	}

	public function postDelImageAjax() {
		$id = Input::get('image_id');
		if ($file = $this->repository->destroy($id)) {
			return Response::json(array('ok' => 1, 'id' => $id));
		} else {
			return Response::json(array('ok' => 0, 'error' => 'Problem deleting image.'));
		}
	}
}
