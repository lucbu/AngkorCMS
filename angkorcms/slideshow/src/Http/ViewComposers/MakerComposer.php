<?php namespace AngkorCMS\Slideshow\Http\ViewComposers;

use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use AngkorCMS\Slideshow\Repositories\Eloquent\AngkorCMSSlideshowRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $slideshow_repository;
	protected $folder_repository;
	protected $image_repository;

	public function __construct(AngkorCMSSlideshowRepository $slideshow_repository, AngkorCMSFolderRepository $folder_repository, AngkorCMSImageRepository $image_repository) {
		$this->slideshow_repository = $slideshow_repository;
		$this->folder_repository = $folder_repository;
		$this->image_repository = $image_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		$slideshow = $this->slideshow_repository->getByModule($viewParameters['module_id']);
		$folders = $this->folder_repository->getFullFolders();
		$imagesroot = $this->image_repository->getListByFolder();

		// Agregate and Send the data to the view
		$data = array_merge(array('slideshow' => $slideshow), $folders, $imagesroot);
		$view->with($data);
	}
}