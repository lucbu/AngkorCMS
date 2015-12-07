<?php namespace AngkorCMS\Medias\Http\Controllers;

use AngkorCMS\Medias\Http\Controllers\AngkorCMSMediaBaseController;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use View;

class AngkorCMSMediaController extends AngkorCMSMediaBaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index(AngkorCMSFolderRepository $folder_repository, AngkorCMSImageRepository $image_repository) {

		$images = $image_repository->getListByFolder();
		$folders = $folder_repository->getListByFolder();
		$data = array_merge($images, $folders);
		return view('angkorcms/medias/index', $data);
	}
}
