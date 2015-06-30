<?php namespace AngkorCMS\Medias\Http\ViewComposers;

use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use Illuminate\Contracts\View\View;

class SelectImageComposer {

	protected $folder_repository;
	protected $image_repository;

	public function __construct(AngkorCMSFolderRepository $folder_repository, AngkorCMSImageRepository $image_repository) {
		$this->folder_repository = $folder_repository;
		$this->image_repository = $image_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		$folders = $this->folder_repository->getFullFolders();
		$images = $this->image_repository->getListByFolder();
		$data = array_merge(array('folders' => $folders), $images);

		// Agregate and Send the data to the view
		$data = array_merge($data, $viewParameters);
		$view->with($data);
	}
}